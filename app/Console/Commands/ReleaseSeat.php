<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Console\Command;

class ReleaseSeat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'release:seat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Release seats that are booked 24 hours ago.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();
        // dd($now);
        $booked = Book::all();
        // dd($booked);
        foreach ($booked as $key => $book) {
            $booked_time = $book->created_at;
            // dd($booked_time);
            $diffInHours = Carbon::parse($booked_time);
            $length = $diffInHours->diffInHours($now);
            // dd($length);
            if ($length>24) {
                $book->delete();
            }
            else {
                session()->flash('error','no set was booked befor 24 hours!');
                return redirect()->back();
            }
        }
    }
}
