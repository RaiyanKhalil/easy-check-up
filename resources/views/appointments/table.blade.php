

<table class="table">
    <tr>
        <th>
            ID
        </th>
        @if ($isDoctor)
            <th>
                Patient
            </th>
        @else
            <th>
                Doctor
            </th>
        @endif
        <th>
            Date
        </th>
        <th>
            Time Start
        </th>
        <th>
            Time End
        </th>
        <th>
            Status
        </th>
        <th colspan="2">
            Actions
        </th>
    </tr>
    @foreach($appts as $a)
    <tr>
        <td>
            {{ $a->id }}
        </td>
        @if($isDoctor)
            <td>
                {{ $a->user_id }} 
            </td>
        @else
            <td>
                {{ $a->doctor->fname }}
            </td>
        @endif
        <td>
            {{ date_format(date_create($a->datetime_start), 'M d, Y') }}
        </td>
        <td>
            {{ date_format(date_create($a->datetime_start), 'h:i A') }}
        </td>
        <td>
            {{ date_format(date_create($a->datetime_end), 'h:i A') }}
        </td>
        <td>
            {{ $a->status_id}}
        </td>
        <td>
            <a href={{'/appointment/delete/' . $a->id}}>Edit</a> fixme
        </td>
        <td>
            <a href={{'/appointment/delete/' . $a->id}}>Delete</a>
        </td>
    </tr>
@endforeach
</table>


    