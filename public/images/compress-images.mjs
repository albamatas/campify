//comando node public/images/compress-images.mjs
//node --experimental-modules public/images/compress-images.mjs

import imagemin from 'imagemin';
import imageminJpegtran from 'imagemin-jpegtran';
import imageminMozjpeg from 'imagemin-mozjpeg';

  

(async () => {
    const files = await imagemin(['*/images/*.{jpg,png}'], {
        destination: 'compressed-images',
        plugins: [
            imageminJpegtran(),
            imageminMozjpeg({
                quality: 75 // Cambia la calidad según tus necesidades
              })
        ]
    });
    
    console.log('Imagenes comprimidas:', files.map(file => file.destinationPath));
})();
