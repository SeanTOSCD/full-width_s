Full-width _s
===

Hi. I'm a starter theme called `Full-width Underscores.` I'm a full-width variation of the `_s` starter theme by Automattic. I'm meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* A just right amount of lean, well-commented, modern, HTML5 templates.
* A helpful 404 template.
* A sample custom header implementation in `inc/custom-header.php` that can be activated by uncommenting one line in functions.php and adding the code snippet found the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/extras.php` that can improve your theming experience.
* Keyboard navigation for image attachment templates. The script can be found in `js/keyboard-navigation.js`. It's enqueued in `functions.php`.
* A script at `js/small-menu.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample CSS layouts in `layouts` for a sidebar on either side of your content.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Licensed under GPLv2 or later. :) Use it to make something cool.

What is Full-width Underscores?
---------------

Full-width Underscores is almost exactly the same as the original `_s` starter theme by the Automattic team. You can find it here: https://github.com/Automattic/_s/

Using their awesome tool at http://underscores.me/, I created this variation of the theme using the theme slug `fwu` to replace `_s` throughout the theme.

I created this variation because the original Underscores was set up to have a page-width HTML structure. That means directly inside of the <code>&lt;body&gt;</code> tag for the theme, a <code>&lt;div&gt;</code> was placed acting as a container for all other site content. While there's nothing wrong with that, many web designers like to create full-width designs that allow design elements to span the entire width of the viewport while keeping the content within a given "page" range.

With a traditional page-width structure, styling the site <code>&lt;body&gt;</code> is the only way to design for full-width. The problem with that is you lose the ability to design the full-width area "behind" individual HTML elements like the <code>&lt;header&gt;</code> or <code>&lt;footer&gt;</code>. Sure, a little design trickery on the <body> will achieve the same visual results but it's a pretty silly approach.

Full-width Underscores addresses this issue by removing the original "container" <code>&lt;div&gt;</code> (#page) from the HTML structure and wrapping each of its former first-child elements in their own containers.

	<div id="header-row" class="full">
		<div class="main">
			
			... <header> Header, for example </header> ...
			
		</div>
	</div>

The corresponding CSS is as follows:

	.full { width: 100% }
	.main { width: 1024px; margin: 0 auto; }

With this HTML and CSS in place, .full elements will span the entire viewport and can be style on their own. Their first-child .main is given a defined width (which can easily be changed) but also centered in the viewport with the margin property. 

This provides a full-width HTML structure great for design flexibility but also allows the site content to remain within a given range on the screen. A page-width look can even be achieved by styling .main the way you would have originally styled the "container" <code>&lt;div&gt;</code> (#page).

I've also added an "inner" class to the <code>&lt;header&gt;</code>, the main content <code>&lt;div&gt;</code> (.site-content), and the <code>&lt;footer&gt;</code>. This class isn't necessary but comes in handy for styling the important elements inside of the full-width structure all at once. For example, they've been given the following CSS:

	.inner { padding: 1em 0; }


This creates a little separation between the edges of the full-width borders and the content they contain.

Getting Started
---------------

Full-width Underscores' one drawback is that the awesome underscores.me can't be used since I've already used it to create this theme. However, you still have the option to roll with FWU's setup or you can mannually replace the theme slug with the same methods used in the original Underscores.

Download `Full-width Underscores` from github. The first thing you want to do is copy the `full-width_s-master` directory and change the name of the theme to something else - Like, say, `megatherium` - then you'll need to do a five-step find and replace on the name in all the templates.

1. Search for `'fwu'` (inside single quotations) to capture the text domain.
2. Search for `fwu_` to capture all the function names.
3. Search for <code>&nbsp;fwu</code> (with a space before it) to capture DocBlocks.
4. Search for `fwu-` to capture prefixed handles.
5. Search for `Text Domain: fwu` in style.css.

OR

* Search for: `'fwu'` and replace with: `'megatherium'`
* Search for: `fwu_` and replace with: `megatherium_`
* Search for: <code>&nbsp;fwu</code> and replace with: <code>&nbsp;Megatherium</code>
* Search for: `fwu-` and replace with: `megatherium-`
* Search for: `Text Domain: fwu` and replace with: `Text Domain: megatherium` in style.css.

Then, update the stylesheet header in style.css and the links in footer.php with your own information. Next, update or delete this readme. Also, understand that no functionality has been removed in this variation of Underscores. Everything still works as the Automattic team intended.

Now you're ready to go! The next step is easy to say but harder to do: make an awesome WordPress theme. :)

Good luck!




Nothing is broken but I'm a little interested in discussion here. This is mainly about consistency for me but I'm wondering if there's more to it than I realize at the moment. Let's look at the page content template part as an example of what I want to discuss. https://github.com/Automattic/_s/blob/master/content-page.php

Lines 10 through 12 are the markup for the `<header>` and its `H1` element that holds the page title. Immediately following the header element is a helpful `<!-- .entry-header -->` comment. Great. 

Now looking at the title function, `the_title()`, we all know that it's more than capable outputting the HTML markup around it using its built-in parameters, $before and $after (which echo by default). It would look something like this.

```php
<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header>' ); ?>
```

I think that's a perfectly normal alternative to the current code. Notice I left off the helper comment. Now let's skip down to line 23 for the edit link function. This is how it appears at the moment.

```php
<?php edit_post_link( __( 'Edit', '_s' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
```

This is basically the same setup as the aforementioned title alternative but uses the `edit_post_link()` function which also has $before and $after parameters that is uses. Again, no helper comment. This could just as easily be written as:

```php
<footer class="entry-footer">
<?php edit_post_link( __( 'Edit', '_s' ), '<span class="edit-link">', '</span>' ); ?>
</footer><!-- .entry-header -->
```

Note: I left the span tag in the function since it's an inline tag and applies directly to the edit link. I also added the helper comment. That would make it consistent with the **current** header and content elements which also sport helper comments.

Why the inconsistency? If you jump on over to the [single content template part](https://github.com/Automattic/_s/blob/master/content-single.php), the setup is a little different because there's more going on in both the header and footer elements. Looking particularly at the edit link in the footer, now that it's displayed in the manner I wrote out above, it also has a help comment after it.

Considering (correct me if I'm wrong) it doesn't hurt anything to write out the HTML and let the function parameters default to none, why not:

* improve template structure consistency
* go all in on helper comments, especially with sibling elements
* always leave the `<footer>` element as "free" markup (applies to pages) and gain the added benefit being able to add to the page footer without having to yank to markup from the function parameters first.
