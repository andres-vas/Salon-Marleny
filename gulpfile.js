import path from 'path';
import fs from 'fs';
import { glob } from 'glob';
import gulp from 'gulp';
const { src, dest, watch, series } = gulp;
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
import terser from 'gulp-terser';
import sharp from 'sharp';

const sass = gulpSass(dartSass);

const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js'
};

export function css(done) {
    src(paths.scss, { sourcemaps: true })
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(dest('./public/build/css', { sourcemaps: '.' }));
    done();
}

export function js(done) {
    src(paths.js)
        .pipe(terser())
        .pipe(dest('./public/build/js'));
    done();
}

export async function imagenes(done) {
    const srcDir = './src/img';
    const buildDir = './public/build/img';
    const images = await glob('./src/img/**/*');

    // Procesa cada imagen usando await para asegurarse de que cada una sea procesada correctamente
    for (const file of images) {
        const relativePath = path.relative(srcDir, path.dirname(file));
        const outputSubDir = path.join(buildDir, relativePath);
        await procesarImagenes(file, outputSubDir); // Usar await aquí
    }
    done();
}

async function procesarImagenes(file, outputSubDir) {
    if (!fs.existsSync(outputSubDir)) {
        fs.mkdirSync(outputSubDir, { recursive: true });
    }

    const baseName = path.basename(file, path.extname(file));
    const extName = path.extname(file).toLowerCase();

    // Procesar imágenes SVG directamente
    if (extName === '.svg') {
        const outputFile = path.join(outputSubDir, `${baseName}${extName}`);
        fs.copyFileSync(file, outputFile);
        console.log(`Archivo SVG copiado: ${outputFile}`);
    } 
    // Procesar otros formatos de imagen
    else if (['.jpg', '.jpeg', '.png', '.webp'].includes(extName)) {
        const outputFile = path.join(outputSubDir, `${baseName}${extName}`);
        const outputFileWebp = path.join(outputSubDir, `${baseName}.webp`);
        const outputFileAvif = path.join(outputSubDir, `${baseName}.avif`);
        const options = { quality: 80 };

        try {
            await sharp(file).jpeg(options).toFile(outputFile);
            console.log(`Imagen procesada: ${outputFile}`);
            await sharp(file).webp(options).toFile(outputFileWebp);
            console.log(`Imagen procesada en WebP: ${outputFileWebp}`);
            await sharp(file).avif().toFile(outputFileAvif);
            console.log(`Imagen procesada en AVIF: ${outputFileAvif}`);
        } catch (err) {
            console.error(`Error procesando la imagen ${file}:`, err);
        }
    } else {
        console.log(`Formato no soportado: ${extName}`);
    }
}

export function dev() {
    watch(paths.scss, css);
    watch(paths.js, js);
    watch('src/img/**/*.{png,jpg,jpeg,webp}', imagenes); // Incluye todos los formatos de imagen soportados
}

export default series(js, css, imagenes, dev);
