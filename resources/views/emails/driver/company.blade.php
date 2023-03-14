Hi {{ $user_name }}<br><br>
A new job has been assigned to you.<br>
The details of the job are as follows:<br><br>
Job Reference Number: {{ $job_id }}<br>
Pick-up Location: {{ $job->fromAddress->company_name }},{{ $job->fromArea->area }}<br>
Drop-off Location: {{ $job->toAddress->company_name }},{{ $job->toArea->area }}<br><br>
Kindly login to the portal to confirm your acceptance of this job.<br>
<a href="{{ config('app.url') }}">{{ config('app.url') }}</a><br>
Should you have any questions or concerns regarding this job, please call  the office.<br><br>
Regards<br>
{{ config('app.name') }}
