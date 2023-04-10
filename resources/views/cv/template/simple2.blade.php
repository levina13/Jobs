<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple 2</title>
	<link rel="stylesheet" href="{{asset('templateCV/modern2/simple2.css')}}">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<div class="canvas">

  <div class="resume">
     <div class="resume_left">
       <div class="resume_profile">
         <img src="{{asset('uploads/profil_image/'.$user->photo)}}" alt="profile_pic">
       </div>
       <div class="resume_content">
         <div class="resume_item resume_info">
           <div class="title">
             <p class="bold">{{$user->first_name}} {{$user->last_name}}</p>
             <p class="regular">{{$user->headline}}</p>
           </div>
           <ul>
             <li>
               <div class="icon">
                 <i class="fas fa-map-signs"></i>
               </div>
               <div class="data">
                 {{$user->address}}
               </div>
             </li>
             <li>
               <div class="icon">
                 <i class="fas fa-mobile-alt"></i>
               </div>
               <div class="data">
                 {{$user->phone_number}}
               </div>
             </li>
             <li>
               <div class="icon">
                 <i class="fas fa-envelope"></i>
               </div>
               <div class="data">
                 {{$user->email}}
               </div>
             </li>
           </ul>
         </div>
         <div class="resume_item resume_skills">
           <div class="title">
             <p class="bold">skill's</p>
           </div>
           <ul>
            {!!$user->skill!!}
          </ul>
         </div>
       </div>
    </div>
    <div class="resume_right">
      <div class="resume_item resume_about">
          <div class="title">
             <p class="bold">About Me</p>
           </div>
           {!!$user->profile!!}
          </div>
      <div class="resume_item resume_work">
          <div class="title">
             <p class="bold">Work Experience</p>
           </div>
          <ul>
            {!!$user->working_experience!!}
          </ul>
      </div>
      <div class="resume_item resume_education">
        <div class="title">
             <p class="bold">Education</p>
           </div>
        <ul>
          {!!$user->education!!}
        </ul>
      </div>
    </div>
  </div>
</div>

</body>
</html>
@include('cv.template.print')