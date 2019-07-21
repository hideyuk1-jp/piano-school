<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Music;
use App\Event;

class PerformanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $performance = $this->performance;
        return [
            'performer' => [
                'required',
                'exists:users,id',
                // editの場合は$this->performanceがNULLでないので自分自身が除外される
                Rule::unique('performances', 'performer_id')->ignore($performance)->where(function ($query) {
                    return $query->where('event_id', $this->input('event'));
                })
            ],
            'event' => 'required|exists:events,id',
            'music' => [
                'required',
                'exists:musics,id',
                function ($attribute, $value, $fail) use($performance) {
                    $music = Music::find($value);
                    $event = Event::find($this->input('event'));

                    if (!$event->isAddableMusic($music, $performance)) {
                        return $fail(':attribute の数が上限に達しています');
                    }
                }
            ],
        ];
    }

    /**
     * エラー時に表示する項目名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'performer' => '発表者',
            'music' => '曲',
            'event' => '発表会'
        ];
    }

}
