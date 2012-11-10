# YiiLiveMarkdown

## What for ?

**Type markdown and watch the html result live.**

## Install 

You may need to change path to framework in `/index.php` by editing `$yii`.

## Config

- Change the ajax refresh interval time in `protected/config/main.php`, edit `md_refreshInterval` value. 
( Default to 1000 miliseconds. )

## How is it made

Trigger an ajax request each second (default) to convert markdown to html (if user types only)

Uses

- [yii build in markdown class](http://www.yiiframework.com/doc/api/1.1/CMarkdown).
- [One% CSS Grid](http://onepcssgrid.mattimling.com/) 

## Why 

I just made it to 

- write README.md files (for github). (Yes, i know other solutions exists but you can consider it as simple yii tiny app example).
- train with git and github.

## Licence

[There should be one](https://github.com/SebSept/YiiLiveMarkdown/issues/10) ... (feel free to give advice). 

## Contribute

[Feel free to contribute](https://github.com/SebSept/YiiLiveMarkdown/issues) and make pull request. 
