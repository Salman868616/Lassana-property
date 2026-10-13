import fs from 'node:fs';

// Some Windows filesystems reject the native path lookup even when the file is
// readable. Let Node's portable resolver handle that case, preserving errors
// if the portable lookup also fails. Keep this workaround out of node_modules.
if (process.platform === 'win32') {
    const nativeRealpath = fs.realpathSync.native;
    fs.realpathSync.native = (path, options) => {
        try {
            return nativeRealpath(path, options);
        } catch (error) {
            if (error.code !== 'EPERM') throw error;
            return fs.realpathSync(path, options);
        }
    };
}

await import(new URL('../node_modules/vite/bin/vite.js', import.meta.url));
