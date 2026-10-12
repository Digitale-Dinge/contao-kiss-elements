# contao-kiss-elements

Content elements and template variants for [contao-kiss](https://github.com/Digitale-Dinge/contao-kiss). The
templates follow the KISS rules in `vendor/digitaledinge/contao-kiss/.claude/skills/kiss-framework-extend/SKILL.md`.

| Element | Files | Needs |
| --- | --- | --- |
| Hero | `rsce_hero` | `hero.pcss` |
| Counter list | `rsce_counter_list` | `counter-list.pcss`, the `countup` controller, `countup.js` |
| History | `rsce_history-item-list` | `history-timeline.pcss` |
| Icon headline list | `rsce_icon_headline_list` | `icon-text.pcss` |
| Quote | `rsce_quote` | |
| Steps list | `rsce_steps_list` | `steps-list.pcss`, backend icons in `public/icons/steps_list/` |
| Team list | `rsce_team_list` | contao-company, the project's `glightbox` controller and `svg-size--normal` helper, `logo-*.svg` in `kiss_icons/svg/` |
| Logo gallery | `content_element/gallery/logo_swiper` | `logo-swiper.pcss` |
| Logo slider | `content_element/swiper/logo` | `logo-swiper.pcss` |
| Footer socials | `content_element/template/footer_socials` | contao-company, `logo-*.svg` in `kiss_icons/svg/` |

## Installation

```bash
composer require digitaledinge/contao-kiss-elements
npm install --save-dev ./vendor/digitaledinge/contao-kiss-elements/layout
```

`layout/package.json` makes this an npm package, like `build/` in contao-kiss. It brings `countup.js` along. Import the
stylesheet in `layout/css/bundle.pcss`, right after contao-kiss:

```css
@import "@digitaledinge/contao-kiss-elements/css";
```

and register the controller in `layout/app.js`:

```js
import { CountupController } from '@digitaledinge/contao-kiss-elements';

application.register('countup', CountupController);
```

The quickstart's `bundle.pcss` line `@source "../../vendor/digitaledinge/*/contao/templates"` already scans these
templates for Tailwind.

## Development

The quickstart requires this repository as a Composer path repository (`../contao-kiss-elements`), so edits here are
live there. Vite resolves the symlinked bundle outside the project, so the quickstart's `vite.config.mjs` sets
`resolve.dedupe` for `@hotwired/stimulus` and `countup.js`.

## License

[PolyForm Noncommercial 1.0.0](LICENSE.md). Noncommercial use is free. Commercial use, including client websites,
needs a separate license from Digitale Dinge GmbH: hallo@digitaledin.ge.
