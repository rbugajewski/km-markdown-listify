# km-markdown-listify
km-markdown-listify is a PHP script for creating nested enumerated Markdown lists from indented plain text. The script is wrapped in a Keyboard Maestro macro, but you can also use it on the command line by passing the plain text as the first argument.

## Installation

When you’ll install the macro, you’ll have to move the PHP script to `~/bin/` or change the path inside the macro. I use Dvorak and Keyboard Maestro doesn’t adopt to other layouts well, so you’ll probably have to change the hot key and ⌘C copy keystroke, too.

I use two spaces as an indentation and the script isn’t smart enough to determine your setup. Thus you’ll have to change the config parameter `$indentation` at the top of the PHP script if you use some different (and in my opinion esoteric) indentation format.

## Usage

Just select some text in an application and press the shortcut. The default shortcut for creating nested, indented Markdown lists is ⌃⇧⌘L.

Let the magic happen. Your clipboard will be restored automatically.

## Example

This:

    My
    Dog
      Will eat
      Your kitten
        And
        Destroy Your
        Mac
      You are not safe
        Safety is an illusion
      You want to buy new apps
      Of course
       From Juicy Cocktail
    Visit [Juicy Cocktail](http://juicycocktail.com/)

will turn into this in plain text:

    1. My
    2. Dog
        1. Will eat
        2. Your kitten
            1. And
            2. Destroy Your
            3. Mac
        3. You are not safe
            1. Safety is an illusion
        4. You want to buy new apps
        5. Of course
        6.  From Juicy Cocktail
    3. Visit [Juicy Cocktail](http://juicycocktail.com/)

And look like this as Markdown output:

1. My
2. Dog
    1. Will eat
    2. Your kitten
        1. And
        2. Destroy Your
        3. Mac
    3. You are not safe
        1. Safety is an illusion
    4. You want to buy new apps
    5. Of course
    6.  From Juicy Cocktail
3. Visit [Juicy Cocktail](http://juicycocktail.com/)

And now go and buy some of our apps to support more of this crazy shit.
