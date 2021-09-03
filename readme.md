# The KD Flow Theme

Flow (KD Flow) is a performant, block-based theme designed to provide flexible and easy content editing for WordPress websites.

## We Love Our Stylesheet

The key foundation of Flow is the compact & powerful stylesheet. There’s a few concepts to cover with the styles:

### Fonts

Google Fonts are ILLEGAL. If you link to Google Fonts in this theme you will go to jail.

Don’t source fonts anywhere aside from the fonts folder. When you need to add a new font, download files, convert to .woff2 if necessary, and add to the fonts folder. Then update style.css to reference those files.

You’ll need to do this in the Font Imports section of the stylesheet, and at the top of the Custom Properties section.

### Colours

While you’re in the Custom Properties section of the stylesheet, you’ll see we have custom properties for gray, primary, and secondary colours. Making use of this design system allows us to quickly re-theme all of our blocks and general look/feel.

When using colours, MAKE SURE YOU USE CUSTOM PROPERTY VALUES, so we can easily share code/blocks from any Flow site with ease.

If you need more than a primary & secondary palette, it is recommended to follow the naming convention for additional colours:

- tertiary
- quaternary
- If you’re going past this point, you need to ask questions about the brand
- quinary
- senary
- septenary
- octonary
- nonary
- denary

### Content Widths & Making the Block Editor Work for You! (Banks hate this theme!!!)

What you need to know is that the block editor sucks by default. The default width shown in the editor is never reflective of the actual on-page output. So we have a bit of work to do to make it good.

A key part of this is ensuring that all entry content that comes from the block editor is not limited in size. We allow entry content to always remain the full width of the screen so we can easily place and size blocks without having to do negative margin hacks or any nonsense like that.

Many default Gutenberg blocks have the option to select different widths, which apply “.alignwide”, or “.alignfull” to the parent element of the block (default Image blocks have this interface). The problem is that there’s no standard for what that means.

Flow’s solution is to define a set standard content widths as custom properties of the document. We associate these with existing Gutenberg classes, and add our own following the naming convention:

- From Gutenberg
  - .alignwide | —width-xlarge
  - .alignfull | —width-full
- Added by Flow
  - .alignsmall | —width-small
  - .alignmedium | —width-medium
  - .alignlarge | —width-large

Please note that by default, we assign the follow to all direct children of .entry-content to ensure all content is limited to the medium width by default and automatically centred on the screen, and we use the set of utility classes above to apply different widths to our content.

1.  max-width: var(--width-medium);
2.      width: var(--content-width);
3.      margin-left: auto;
4.      margin-right: auto;

One of the important reasons for doing this is limiting text to a reasonable width by default, so your eyes don’t have to jump from one end of a wide screen to another while reading text.

You’ll notice the —content-width custom property that is declared on the root element. This is the maximum width for content that is not a full-width block. Generally this only comes into effect on smaller screens. If you want more space between the content and the sides of the screen on mobile, try changing this to something like 85vw instead of 90vw.

### The Flow Class & Associated Utilities

The .flow class applies a programmatic layout to direct child elements. By default, it will give all direct children except the first a margin-top value of 2rem. You can change the value that is applied my manually setting the —flow property on the parent element, or also applying any of the utility classes that do that for you:

- .flow-xs
- .flow-sm
- .flow-md
- .flow-lg
- .flow-xl
- .flow-xxl

Please note that by default, entry content that comes from the block editor is spaced out by application of the .flow class. This ensures we don’t have any ugly instances of elements getting all up in each other’s business.

You can make use of another set of utility classes to override this behaviour, which is really useful for making blocks play nice together in Gutenberg. The “space” classes target the top & bottom margins of the element, and the “top” and “bottom” ones do what they say on the tin:

- .flow-space-none
- .flow-space-sm
- .flow-space-md
- .flow-space-lg
- .flow-space-xl
- .flow-top-none
- .flow-top-sm
- .flow-top-md
- .flow-top-lg
- .flow-top-xl
- .flow-bottom-none
- .flow-bottom-sm
- .flow-bottom-md
- .flow-bottom-lg
- .flow-bottom-xl

One other thing to be aware of is the .first-block-negative-margin class. If the first block on a page has this class, it will have a negative margin so it directly touches the site header. This is good for things like banners and other full width blocks, but you can use it for something else if it makes sense 🤷‍♀️

Please note that you will also need to add a selector in editor-style.css for any block with this class, to ensure the negative margin is applied on the backend as well as the frontend.

### Otter Styling Tings

Anything else is pretty much fair game. Customise your header, footer, and whatever other elements to your heart’s content. Just don’t forget about all the nice utilities and styling options you already have. You can drop .flow on a custom block, and make it wide with .alignwide. This helps to keep your work transferable between other Flow sites.

## Custom Blocks & Developer Tears

WordPress is pushing very hard in the direction of block-based editing. We must follow and shed whatever tears that come from the process.

### Restricting Blocks Snippet

We have a snippet that restricts what blocks are available in the block editor. This is because almost all of the default Gutenberg blocks suck, and the stylesheet that comes with it by default sucks too.

When you create a new block, or need to enable a block that comes from a plugin or other source, simply add it to the list of allowed blocks in this snippet.

### Gutenberg Blocks from Scratch

Generally, we will make use of custom blocks for layouts, as the allow us to accurately display inner-block content in the block editor. At the moment, this is Jesse writing them as plugins and supplying upon request.

Once Jesse finds time to make better defaults, they will eventually be integrated into the theme itself. For now, if you need a block that handles layout, you gotta ask Jesse - sorry about that!

### Genesis Custom Blocks

Most of your work with custom blocks will be done via the Genesis Custom Blocks plugin. This plugin provides a really nice interface to quickly build custom blocks. For most blocks/content this is suitable.

If you need help figuring this stuff out, try looking at/reverse-engineering stuff from the blocks folder.

When writing custom blocks this way, please make use of the global stylesheet as much as possible to keep styling compact & consistent.

### Adding Editor Styles for Genesis Custom Blocks

One of the things we pride ourselves on with this theme is making the block editor actually look like the frontend output. One problem with Genesis Custom Blocks is that you’ll need to manually add to editor-style.css if your custom block has a width that isn’t the medium width from the global styles.

These are clearly labelled in the editor-style.css file, but if you have any problems making it work, ask Jesse ✌️
