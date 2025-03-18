<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'user_id',
        'position'
    ];

    /**
     * Get the user that owns the link.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function moveUp()
    {
        $order = $this->position;
        $newOrder = $order - 1;

        $user = $this->user;
        $swapWith = $user->links()->where('position', '=', $newOrder)->first();

        if ($swapWith) {
            $this->update(['position' => $newOrder]);
            $swapWith->update(['position' => $order]);
        }
    }

    public function moveDown()
    {
        $order = $this->position;
        $newOrder = $order + 1;

        $user = $this->user;
        $swapWith = $user->links()->where('position', '=', $newOrder)->first();

        if ($swapWith) {
            $this->update(['position' => $newOrder]);
            $swapWith->update(['position' => $order]);
        }
    }
}
