<?php
/**
 * Created by IntelliJ IDEA.
 * User: Pablo work2
 * Date: 24/05/19
 * Time: 08:15
 */

namespace App\Notifications;
use Illuminate\Notifications\Messages\MailMessage;

class TrackMessage extends MailMessage
{
    public function __construct()
    {

    }

    public function addtimes($tracktimes){

            foreach ($tracktimes as $row) {
                $this->with($row->start . "--". $row->end ." -- ". $row->hours." Hours");
            }

        return $this;
    }

}