# UROPE
<i>aka Universal Role Playing Engine</i>

## About UROPE and the whole VTT thing
UROPE was actually the name of a custom tabletop role playing system I had created back in the 90s, based on the d20. The actual system remains printed in my bookcase and from time to time I peek through its pages and get amazed by the seer ammount of time I used to invest in such efforts (no regrets!) Since then I have devised a multitude of other system with equivalent unsuccessfull names and poor playability. Needless to mention we still play RPGs and I have been stuck with the DM role for the last 30 years.
During the COVID-19 months we have tried some online vtt solutions and it has worked well for the most part. Except for that these products suck, they really suck for the most part. So I have decided to make my own VTT - because why not? - and - by the way - experiment with some technologies just for fun. So this is a project just for my personal amusement, do not expect best practices etc, but if you find the idea appealing in the end, please by my guest - but proceed at your own risk :)

## Technologies in the project
So I have started with a basic laravel 7 installation with a basic auth scuffolding (since I care not at the moment about learning twig-or-yet-another-templating-engine besides blade and neither I care about inertia, livewire or whichever new hype - no offence)
I then added Vue, because it seems to go well with Laravel. Then because I wanted to try out some store management to see if it is any good for my web dev endeavors I added VueEx and works like a charm, though in the end it seems to me I could live without Vue, just with plain JS and be happy as well, but Vue it is.
Then I needed some real time data trasnfering, so the way to go was laravel websockets with Laravel echo and Pusher. Maybe in the future I will replace Pusher with some community stuff but too bored atm.
In the end I imported Phaser3 as well (which at the moment I believe it has been disabled, since there is no real use for it) just to see if it works and it worked OK, compiled well with laravel mix and there, I had the phaser logo spin its 3d self inside a window (that is also how far I went with phaser :) The idea behind Phaser is if in the future I need to do graphics or physics or whatever, to have some kind of basis to build upon, or maybe make just a game with it - I don't know.

## The project so far
I guess I need not to explain what a virtual tabletop is, so I move on.
The main elements so far are:
1. A login screen with Spongebob Squarepants (I do not own the rights for this image but it is so fitting!) After authentication the users are redirected to their own page, while DMs to a Dashboard
2. A user's page where a user can see his characters.
3. The DMs dashboard, where the DM can see all characters
4. A lobby page, doing nothing or very little at the moment
5. A game page where the main action is going on. The game page include the following components:
<ul>
    <li> A characters strip where the portraits of the chracters are been displayed</li>
    <li> A log pane, where various messafges are being displayed</li>
    <li> A test button for rolling a d20 and pushing the result to the log</li>
    <li> a resizable map (the DM cas set the size) with square tiles where token can be placed. The map tiles can hold information such as coordinates and other stuff, and tokens can be dragged and dropped inside them. The map is beeing updated in real time. Players can click on the tokens and do stuff</li>
</ul>

## Future plans
Since this is another yet of my infinite side-projects there is no such thing as a timetable. Stuff may or may not be added according to time I choose to further invest. Nevertheless plans include:
1. Create an intuitive player actions interface with round by round, step by step options.
2. Implement a graphic inventory with drag and drop functionality and visual elements instead of text descirpitions ffs.
3. Create a combat and initiative tracker and implement actual combat with dicerolling
4. Create a 3e dice roller (The plan is to get this done in Unity3d with blendfer dice models and unity physics and import it as a webAssembly module, because it seems a fun thing to do!)
5. Add custom map support (do not know yet what I want)
6. Add complete character, monster, items, spells and campaign models and get a proper back end admin instead of manual bd entries. 
8. Implement a saving system to get persistent data accross sessions
9. Add support for a proper system like Pathfinder, or D&D SRD, or Call of Cthulhu or whatever... 
10. Add audiovisual effects and maybe line of sight and other stuff...
11. You name it, I do it (maybe, or maybe not) ...

## Instructions
In order for this project to run on your machine you need to make your migrations, seed your db, run your npm and composer installs and set a PUSHER account into your .env file. You will also need to set your BROADCAST DRIVER to pusher. Hopefully it will work, I personally had had a bad time trying to set this thing up from github after my PC had been stolen this summer...


## License

The urope project is not yet a thing, but should it ever become a thing, it should be an open-sourced software licensed under the GNU General Public licence https://opensource.org/licenses/GPL-3.0
