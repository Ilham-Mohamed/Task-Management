<?php

namespace App\Console\Commands;

use App\Mail\OverdueTask;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendOverdueTaskMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:overdue-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send overdue task mail';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        

        // Get all tasks that are overdue and have not been sent yet
        $overdueTasks = Task::where('duedate', '<=', Carbon::now())->where('sent', false)->get();

        foreach ($overdueTasks as $task) {
            // Send email to the responsible person
            $user = Auth::user();
            Mail::to('ilham@gmail.com')->send(new OverdueTask($task));
            
            // Update the sent column to prevent sending the same email again
            $task->sent = true;
            $task->save();
    }
}
}