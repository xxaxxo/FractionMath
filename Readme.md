# Skeleton for fast creation of packages #

Steps:
<ul>
<li>Clone the repo</li>
<li>Rename PackageName in all files</li>
<li>Include the local files into your other composer.json require like:

```json
"repositories": [
        {
            "type": "path",
            "url": "/path/to/cloned/package",
            "options": {
                "symlink": false
            }
        }
    ],
```
</li>
</ul>

## Branches ##
### Master - for normal packages ###
### feature/laravel-skeleton - for laravel packages ###

