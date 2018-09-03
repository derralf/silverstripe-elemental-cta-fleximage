# SilverStripe Elemental CTA Flex-Image
A Call-to-Action block with HTML-Text and Image  
(private project, no help/support provided)

## Requirements

* SilverStripe ^4.2
* dnadesign/silverstripe-elemental ^3.0
* sheadawson/silverstripe-linkable ^2.0@dev

## Suggestions
* derralf/elemental-styling

Modify `/templates/Derralf/Elements/CtaFlexImage/Includes/Title.ss` to your needs when using StyledTitle from derralf/elemental-styling.


## Installation

- Install the module via Composer
  ```
  composer require derralf/elemental-cta-fleximage
  ``` 

## Configuration

A basic/default config. Add this to your **mysite/\_config/elements.yml**

Note the example options for `colors`, for which the styles are included in the default style sheet.

```

---
Name: elementctafleximage
---
Derralf\Elements\CtaFlexImage\Element\ElementCtaFlexImage:
  styles:
    image-right: 'Image Right'
  styles_default_description: 'Standard: Image left'
  colors:
    primary: 'primary'
    success: 'success'
    info: 'info'
    warning: 'warning'
    danger: 'danger'
  readmore_link_class: 'btn btn-default btn-readmore'
```

Additionally you may apply the default styles:

```
# add default styles
DNADesign\Elemental\Controllers\ElementController:
  default_styles:
    - derralf/elemental-cta-fleximage:client/dist/styles/frontend-default.css
```

See Elemental Docs for [how to disable the default styles](https://github.com/dnadesign/silverstripe-elemental#disabling-the-default-stylesheets).

### Adding your own templates

You may add your own templates/styles like this:

```
Derralf\Elements\CtaFlexImage\Element\ElementCtaFlexImage:
  styles:
    MyCustomTemplate: "new customized special Layout"
```

...and put a template named `ElementCtaFlexImage_MyCustomTemplate.ss`in `themes/{your_theme}/templates/Derralf/Elements/CtaFlexImage/Element/`  
**and/or**
add styles for `.derralf__elements__ ctaflexmage__element__ ctafleximage.mycustomtemplate` to your style sheet.  

Note: The left/right version is supplied via css (no separate template).


## Template Notes

Templates based on Bootstrap 3+, but need some extra styling

- Optionaly, you can require basic CSS stylings provided with this module to your controller class like **mysite/code/PageController.php**  
  
  ```
  Requirements::css('derralf/elemental-cta-fleximage:client/dist/styles/frontend-default.css');
  ```
- or copy over and modify `client/src/styles/frontend-default.scss` in your theme scss 

## Screen Shots

(not available)


