# UROPE
aka Universal Role Playing Engine

## About UROPE and the whole VTT thing
UROPE was actually the name of a custom tabletop role playing system I had created back in the 90s, based on the d20. The actual system remains printed in my bookcase and from time to time I peek through its pages and get amazed by the seer ammount of time I had to invest in such efforts (no regrets!) Since then I have devised a multitude of other system with equivalent unsuccessfull names and poor playability. Needless to mention we still play RPGs and I have been stuck with the DM role for the last 30 years.
During the COVID-19 months we have tried some online vtt solutions and it has worked well for the most part. Except for that these products suck, they really suck for the most part. So I have decided to make my own VTT and - by the way - epxeriment with some technologies just for fun.
So I have started with a basic laravel 7 installation with a basic auth scuffolding (since I care not about learning twig or yetanothertemplatingengine besides blade and neither I care about the laravel 8 auth systems whatever)
I then added Vue, because it seems to go well with Laravel and because I wanted to try out some store management. So I added VueEx

## Instructions
In order for this project to run you on your machine you need to make your migrations, seed your db, run your npm and composer installs and set a PUSHER account into your .env file. You will also need to set your BROADCAST DRIVER to pusher.


## License

The urope project is not yet a thing, but should it ever become a thing, it should be an open-sourced software licensed under the GNU General Public licence https://opensource.org/licenses/GPL-3.0
