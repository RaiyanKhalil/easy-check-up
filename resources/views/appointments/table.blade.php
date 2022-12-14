
<table class="table">
    <tr>
        <th>
            #
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
                <span class="text-capitalize">{{ $a->patient->fname }} {{ $a->patient->lname }}</span>
            </td>
        @else
            <td>
                <span class="text-capitalize"> Dr {{ $a->doctor->f_name }} {{ $a->doctor->l_name }}</span>
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
            @switch($a->status_id)
                @case(2)
                    <span class="text-success">Approved</span>
                    @break
            
                @case(3)
                    <span class="text-muted">Cancelled</span>
                    @break
            
                @default
                    <span class="text-primary">Pending</span>
            @endswitch
        </td>
        <td>
            @if(!$isDoctor)
                @if($a->status_id == 1)
                <a class="text-warning" href={{route('appointment-edit', $a->id) }}>Edit</a>
                @endif
            @else
                @if($a->status_id == 1)
                    <a class="text-success" href={{ route('appointment-approve', $a->id)}}>Approve</a>
                @endif
            @endif

            
        </td>
        <td>
            @if($a->status_id == 3)
                @if(!$isDoctor)
                    <a class="text-danger" href={{ route('appointment-delete', $a->id)  }}>Delete</a>
                @endif
            @elseif($a->status_id == 1)
                <a class="text-danger" href={{ route('appointment-cancel', $a->id)  }}>Cancel</a>
            @endif
            
        </td>
    </tr>
@endforeach
</table>


    