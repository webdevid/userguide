1. Remove this page: http://d.pr/i/OTeW

2. Use JavaScript's strict mode https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions_and_function_scope/Strict_mode

3. Import the Theme Unit Test [http://codex.wordpress.org/Theme_Unit_Test] file and  make sure that:

- Posts display correctly, with no apparent visual problems or errors.
- Posts display in correct order.
- Page navigation displays and works correctly.
- As "sticky posts" are a core feature, the theme should style and display them appropriately.
- Lack of body text should not adversely impact the layout.
- Theme must incorporate both the "Tag" and the "Category" taxonomies in some manner.
- Floats are cleared properly for floated element (thumbnail image) at the end of the post content.

4. Please debug your theme:

- Enable WP_DEBUG and fix all the notices and warnings

- Install http://wordpress.org/extend/plugins/developer as “Theme for a self-hosted WordPress installation”, and let it install the following debug tools:

* Debug Bar
* Debug Bar Cron
* Log Deprecated Notices
* Monster Widget
* Theme Check
