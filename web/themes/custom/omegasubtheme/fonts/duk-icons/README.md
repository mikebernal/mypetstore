# Duk Icons

These are created using [IcoMoon](https://icomoon.io/app/) and are a subset of the FontAwesome icons. 

## Updating icons

For backwards comparability icons should not be removed from this set but can be selectively added. Any newly added 
fonts should also be added to `scss/settings/_icons.scss`. Be conscious of file sizes and load added to pages.

There is a tool [here](https://bitbucket.org/doghouseagency/icomoon-to-duk-converter/src/master/) that quickly converts
the IcoMoon icon codes into something suitable for sass maps.

Visit [IcoMoon App](https://icomoon.io/app) and Import a project (top right "untitled project" the click Import project). 
Then provided it the `selection.json` found in this folder. Add any new icons and "Generate font". From the resulting 
zip, replace the font files and new `selection.json` in this folder.

Take note of the names icomoon assigns to icons, you may want to change them to keep things clean and usable, avoid 
things like `facebook-4`, `arrow-3`, etc. Things should have descriptive names. 

## Forking / Creating custom icon sets

Copy this folder into your theme and follow the steps above for "updating icons". Also copy `scss/settings/_icons.scss` 
into your theme and update vars accordingly.

Finally add your icons to `$duk-icons` and use the correct key when using icon mixins.

### Adding custom icon set to DUK

In your SCSS, do something like this. It should correctly merge your icons with the default set.
```
$my-custom-icons: ( ... );
$duk-icons: (my-custom-icons: $my-custom-icons);
```
