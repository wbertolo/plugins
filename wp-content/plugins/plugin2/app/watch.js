const chokidar = require('chokidar');
const { exec } = require('child_process');

const watcher = chokidar.watch('src/**/*', {
    ignored: /build/,
    persistent: true,
});

watcher.on('change', (path) => {
    console.log(`File changed: ${path}`);
    exec('npm run build', (error, stdout, stderr) => {
        if (error) {
            console.error(`Error: ${error.message}`);
            return;
        }
        if (stderr) {
            console.error(`Stderr: ${stderr}`);
            return;
        }
        console.log(stdout);
    });
});

console.log('Watching for file changes...');
