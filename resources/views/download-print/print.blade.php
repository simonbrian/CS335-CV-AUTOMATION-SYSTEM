@extends('layouts.print-app')

@section('content')
<div class="container-print">
    <div class="custom-paper m-auto" id="cv">
        <div class="header-paper1 p-3">
            <div class="img-profile">
                @if (!empty(auth()->user()->logo_url))
                    <p>    
                        <img src="{{ asset('storage/profile_images/' . auth()->user()->logo_url) }}"> 
                    </p>
                @else
                    <p>
                        <img src="{{ asset('storage/profile_images/default.png') }}"> 
                    </p>
                @endif
            </div>
            <div class="heading">
                @if ($user_exist)
                    <h2>{{ strtoupper(auth()->user()->first_name . " " . auth()->user()->middle_name . " " . auth()->user()->last_name) }}</h2>
                    <p>{{ $personal_information->Email }} | {{ $personal_information->Phone_Number }} | {{ $personal_information->Address }}</p>
                @else
                    <h2>Full Name</h2>
                    <p>Email | Number | Address</p>
                @endif
            </div>
        </div>
    </div>

    <div class="body-paper1">

        {{-- Summary about yourself --}}
        <div class="section">
            <div class="body-heading">
                <h4>Summary</h4>
                <div class="box-hidden">Summary</div>
                <div class="border-center"></div>
            </div>
            <p class="full-width">A summary is a brief statement or restatement of main points, especially as a conclusion to a work: a summary of a chapter. A brief is a detailed outline, by heads ...</p>
        </div>

        {{-- Education Background --}}
        <?php $count = count($education_backgrounds); $i = 0; ?>
        @if (count($education_backgrounds) > 0)
        <div class="section">
            <div class="body-heading">
                <h4>Education Background</h4>
                <div class="box-hidden">Education Background</div>
                <div class="border-center"></div>
            </div>
            @foreach ($education_backgrounds as $education_background)
                <?php ++$i ?>
                <p class="full-width">
                    {{ $education_background->name }}<br/>
                    <strong>{{ $education_background->type }}</strong><br/>
                    {{ $education_background->TimeStarted }} - {{ $education_background->TimeEnded }}<br/>
                </p>
                <div class="clear-both"></div>
                @if ($count !== $i) <br/><br/> @endif
            @endforeach
            </div>
        @endif

         {{-- Work Experiences --}}
         <?php $count = count($work_experiences); $i = 0; ?>
         @if (count($work_experiences) > 0)
         <div class="section">
             <div class="body-heading">
                 <h4>Work Experience</h4>
                 <div class="box-hidden">Work Experience</div>
                 <div class="border-center"></div>
             </div>
             @foreach ($work_experiences as $work_experience)
                 <?php ++$i ?>
                 <p class="half-width">
                     {{ $work_experience->name }}<br/>
                     {{ $work_experience->TimeStarted }} - {{ $work_experience->TimeEnded }}<br/>
                 </p>
                 <p class="half-width">
                     {{ $work_experience->Description }}
                 </p>
                 <div class="clear-both"></div>
                 @if ($count !== $i) <br/><br/> @endif
             @endforeach
             </div>
         @endif

         {{-- Project and Reaserches --}}
         <?php $count = count($project_researches); $i = 0; ?>
         @if (count($project_researches) > 0)
         <div class="section">
             <div class="body-heading">
                 <h4>Project And Researches</h4>
                 <div class="box-hidden">Project And Researches</div>
                 <div class="border-center"></div>
             </div>
             @foreach ($project_researches as $project_research)
                 <?php ++$i ?>
                 <p class="full-width">
                     {{ $project_research->name }}<br/>
                     {{ $project_research->TimeStarted }} - {{ $project_research->TimeEnded }}<br/>
                 </p>
                 <div class="clear-both"></div>
                 @if ($count !== $i) <br/><br/> @endif
             @endforeach
             </div>
         @endif

         {{-- Hobbies --}}
         @if (count($hobbies) > 0)
         <div class="section">
             <div class="body-heading">
                 <h4>Hobbies</h4>
                 <div class="box-hidden">Hobbies</div>
                 <div class="border-center"></div>
             </div>
             <ul>
                 @foreach ($hobbies as $hobby)
                     <li>{{ $hobby->name }}</li>
                 @endforeach
             </ul>
             <div class="clear-both"></div>
         </div>
         @endif

         {{-- Languages --}}
         @if (count($languages) > 0)
         <div class="section">
             <div class="body-heading">
                 <h4>Languages</h4>
                 <div class="box-hidden">Languages</div>
                 <div class="border-center"></div>
             </div>
             <ul>
                 @foreach ($languages as $language)
                     <li>{{ $language->name }}</li>
                 @endforeach
             </ul>
             <div class="clear-both"></div>
         </div>
         @endif

         {{-- Referees --}}
         <?php $count = count($referees); $i = 0; ?>
         @if (count($referees) > 0)
         <div class="section">
             <div class="body-heading">
                 <h4>Referees</h4>
                 <div class="box-hidden">Referees</div>
                 <div class="border-center"></div>
             </div>
             @foreach ($referees as $referee)
                 <?php ++$i ?>
                 <p class="full-width">
                     {{ $referee->First_Name }} {{ $referee->Second_Name }}<br/>
                     <strong>{{ $referee->Email }} | {{ $referee->Phone_Number }}</strong><br/>
                 </p>
                 <div class="clear-both"></div>
                 @if ($count !== $i) <br/><br/> @endif
             @endforeach
             </div>
         @endif
    </div>
@endsection