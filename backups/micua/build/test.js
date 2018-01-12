const fs = require('fs')
const path = require('path')

const rootDir = path.resolve(__dirname, '..')

fs.readdir(rootDir, (err, files) => {
  files
    .filter(item => fs.statSync(path.resolve(rootDir, item)).isFile() && item.endsWith('.php') )
    .forEach(item => {
      fs.readFile(path.resolve(rootDir, item), 'utf8', (err, content) => {
        fs.writeFile(path.resolve(rootDir, item), `${content}
echo '${item}';
          `, (err) => {
            if (err) console.log(`${item} error`)
          })
      })
    })
})
