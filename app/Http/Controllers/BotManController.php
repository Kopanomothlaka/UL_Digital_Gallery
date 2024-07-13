<?php

namespace App\Http\Controllers;

use App\Models\picture;
use App\Models\Post;
use App\Models\Video;
use BotMan\BotMan\BotMan;
use http\Client;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            if ($message == 'hi') {
                $this->askName($botman);
            } else if ($message == 'show pictures') {
                $this->showPictures($botman);
            } else if ($message == 'show videos') {
                $this->showVideos($botman);
            } else if ($message == 'login') {
                $this->redirectToLogin($botman);
            } else if ($message == 'help') {
                $this->provideHelp($botman);
            } else if ($message == 'show') {
                $this->askShowOption($botman);
            } else {
                $botman->reply("I'm sorry, I didn't understand that. You can say 'hi', 'show pictures', 'show videos', 'login', 'help', or 'show'.");
            }

        });

        $botman->listen();
    }

    /**
     * Ask for the user's name.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function (Answer $answer) {

            $name = $answer->getText();

            $this->say('Nice to meet you, how can I help you ' . $name . '?');
        });
    }

    /**
     * Show approved pictures from the database.
     */
    public function showPictures($botman)
    {
        $posts = Post::where('status', 'approved')->whereNotNull('image_path')->get();

        if ($posts->isEmpty()) {
            $botman->reply("No pictures found.");
        } else {
            foreach ($posts as $post) {
                $botman->reply("Title: " . $post->text . "\nURL: " . $post->image_path);
            }
        }
    }

    /**
     * Show approved videos from the database.
     */
    public function showVideos($botman)
    {
        $videos = Video::where('status', 'approved')->whereNotNull('video_path')->get();

        if ($videos->isEmpty()) {
            $botman->reply("No videos found.");
        } else {
            foreach ($videos as $video) {
                $botman->reply("Title: " . $video->title . "\nURL: " . $video->video_path);
            }
        }
    }

    /**
     * Redirect the user to the login page or provide login instructions.
     */
    public function redirectToLogin($botman)
    {
        $loginUrl = route('login'); // Replace 'login' with your actual route name

        $botman->reply("Please visit our login page to log in: $loginUrl");
    }

    /**
     * Provide help instructions.
     */
    public function provideHelp($botman)
    {
        $botman->reply("Here are some commands you can try:\n- 'hi' to start\n- 'show pictures' to see approved pictures\n- 'show videos' to see approved videos\n- 'login' to log into your account\n- 'help' to see this message again");
    }

    /**
     * Ask the user whether to show pictures or videos.
     */
    public function askShowOption($botman)
    {
        $question = Question::create('What would you like to see?')
            ->addButtons([
                Button::create('Pictures')->value('show pictures'),
                Button::create('Videos')->value('show videos'),
            ]);

        $botman->ask($question, function (Answer $answer) {
            $selectedOption = $answer->getText();

            if ($selectedOption === 'show pictures') {
                $this->showPictures($this->bot);
            } else if ($selectedOption === 'show videos') {
                $this->showVideos($this->bot);
            } else {
                $this->bot->reply('Invalid option. Please type "show" and select one of the options.');
            }
        });
    }
}

