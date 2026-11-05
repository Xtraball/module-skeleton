# Module Skeleton for Siberian

The smallest complete Siberian module: one database table, one editor form that saves into it, and one mobile page that loads it. Copy it, rename it, grow it.

Requires Siberian 4.16.0 or later (see `dependencies.system.version` in `package.json`; set it to the oldest version your module supports). The developer documentation is at <https://developers.siberiancms.com/>, start with [Modules](https://developers.siberiancms.com/module/) and, if you are an AI agent, [For AI agents](https://developers.siberiancms.com/agents/).

## What is inside

| File | Role |
|------|------|
| `package.json` | Name, version and the Siberian version it needs. Raise `version` every time you upload a new package |
| `init.php` | Runs when Siberian starts (empty here: register hooks, translations and SCSS in it) |
| `resources/db/schema/module_skeleton.php` | The table. Replayed on every update, new fields are added, fields are never removed |
| `resources/db/data/module_skeleton.php` | Data and queries replayed on every install and update, keep them safe to run twice |
| `Model/Skeleton.php`, `Model/Db/Table/Skeleton.php` | The model and its table |
| `Form/Skeleton.php` | The editor form |
| `controllers/ApplicationController.php` | Editor side: `saveAction` validates the form and saves the row |
| `resources/design/desktop/flat/` | The editor page: layout XML, `edit.phtml`, `edit.js`, `edit.css`, the layout image |
| `controllers/Mobile/ListController.php` | The JSON the app loads (`loadContentAction`) |
| `features/module_skeleton/feature.json` | Declares the feature to the app: route, controller, template, icons, files |
| `features/module_skeleton/js/` | The Angular controller and the factory that calls the server |
| `features/module_skeleton/assets/templates/l1/index.html` | The mobile page |
| `features/module_skeleton/scss/skeleton.scss`, `icons/` | Styles and the feature icons |
| `tools/pack.sh` | Builds the zip package |

The flow: the editor form posts to `ModuleSkeleton_ApplicationController::saveAction`, which saves a row. In the app, the route in `feature.json` opens `SkeletonIndexController`, its `Skeleton` factory calls `moduleskeleton/mobile_list/load-content` through `$pwaRequest`, and the template shows the result.

## Make it yours

Rename these consistently (search the whole folder):

| Find | Where it is used |
|------|------------------|
| `ModuleSkeleton` | Class prefix of every PHP class, and the module folder name, `package.json` name, `feature.json` name |
| `module_skeleton` | Table name, feature code, `features/` folder, design template folder |
| `moduleskeleton` | URLs (`moduleskeleton/application/save`, `moduleskeleton/mobile_list/...`), layout XML, `desktop_uri` |
| `Skeleton`, `skeleton` | Model, form, Angular controller and factory, route state and URL |

Then rename the files and folders that carry those names.

## Build and install

```bash
./tools/pack.sh
```

This creates `<name>-<version>.zip` with `package.json` at the root. Upload the zip in the Siberian backoffice module installer. For development, copy the folder to `siberian/app/local/modules/<ModuleName>` in a Siberian checkout.

Do not use "Download ZIP" from GitHub: it puts everything in a sub folder and will not install.

## More

- [Modules](https://developers.siberiancms.com/module/): structure, schema, `feature.json`, translations, packaging
- [Forms](https://developers.siberiancms.com/module/forms/) and [Hooks](https://developers.siberiancms.com/module/hooks/)
- [Ionic tools](https://developers.siberiancms.com/stack/ionic-tools/): Dialog, Loader, Picture, Location and the other app services
- The [Job module](https://github.com/Xtraball/Siberian/tree/trunk/siberian/app/sae/modules/Job) in the Siberian core is a full-sized example with the same layout
