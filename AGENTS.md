# AGENTS.md

Instructions for coding agents that start a Siberian module from this skeleton.

1. Read <https://developers.siberiancms.com/agents/> first, then <https://developers.siberiancms.com/module/>. The whole documentation is one text file at <https://developers.siberiancms.com/llms-full.txt>. When the docs and the Siberian code on `trunk` disagree, the code wins.
2. Copy this folder, then rename everything with the table in `README.md` ("Make it yours"). Do it in one pass and search the whole tree for the old names afterwards: a left-over `ModuleSkeleton` or `module_skeleton` fails at install or at runtime.
3. Keep the layout. Do not add `bootstrap.php`, `.csv` translation files or assets registered from `resources/var/apps`: this is the current layout (`init.php`, `features/<code>/feature.json`).
4. Rules:
   - New user-visible texts go in a `.po` catalog (`resources/translations/default/<code>.po`) and are written with `p__('<context>', '...')` in PHP. When PHP prints a text inside a JavaScript string, use `p__js` instead (see the Utils page of the docs), never plain `p__`.
   - New behaviour is an option, off by default.
   - Schema and data files must be safe to run twice. They run on every update, and the module is only updated when `version` in `package.json` is higher than the installed one: raise it when you change a schema.
   - LF line endings only.
   - Do not commit the generated zip.
5. The app code runs on Android and iOS: do not depend on a behaviour of only one platform.
6. After adding, renaming or deleting an editor design file, rebuild the design cache (`php cli cache:design`, see the CLI page of the docs).
7. Test in a Siberian checkout of `trunk`: copy the module to `siberian/app/local/modules/<ModuleName>`, install it, open the feature in the editor, save, and open the page in the app preview. A module is done when that works end to end.
8. Report problems with the docs or the core at <https://github.com/Xtraball/Siberian/issues> with the Siberian version.
