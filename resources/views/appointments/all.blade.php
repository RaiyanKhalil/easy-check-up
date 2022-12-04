<table>
    <tr>
        <th>
            ID
        </th>
        <th>
            Patient
        </th>
        <th>
            Doctor
        </th>
        <th>
            Start
        </th>
        <th>
            End
        </th>
        <th>
            Status
        </th>
    </tr>
    @foreach($appts as $a)
    <tr>
        <td>
            {{ $a->id }}
        </td>
        <td>
            {{ $a->user_id }}
        </td>
        <td>
            {{ $a->doctor_id }}
        </td>
        <td>
            {{ $a->datetime_start }}
        </td>
        <td>
            {{ $a->datetime_end }}
        </td>
        <td>
            {{ $a->status_id}}
        </td>
        <td>
            <a href={{'/appointment/delete/' . $a->id}}>Delete</a>
        </td>
    </tr>
@endforeach
</table>


    