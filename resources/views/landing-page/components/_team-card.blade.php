<div class="flex flex-wrap gap-8 justify-center">
    <x-LandingPage.team-card 
        image="{{ asset('/images/teamCard-img/daffy.jpg') }}" 
        name="Daffy Fauzan" 
        role="Back-End Developer" 
        description="Daffy excels in building efficient server-side logic and optimizing database performance, ensuring our projects run seamlessly behind the scenes." 
        :socials="[
            'instagram' => 'https://www.instagram.com/daffi_fauzan/',
        ]" 
    />
    <x-LandingPage.team-card 
        image="{{ asset('/images/teamCard-img/manca.jpg') }}" 
        name="Riesky Fabiansyah" 
        role="Front-End Developer" 
        description="With a passion for color and a love for clean lines, Riesky brings all our wildest design dreams to life." 
        :socials="[
            'instagram' => 'https://www.instagram.com/rieskyfabs/',
            'linkedin' => 'https://www.linkedin.com/in/rieskyfabs/',
            'facebook' => 'https://facebook.com/rieskyfabs/',   
        ]" 
    />
    <x-LandingPage.team-card 
        image="{{ asset('/images/teamCard-img/sultan.jpg') }}" 
        name="Sultan Faid" 
        role="Back-End Developer" 
        description="Sultan specializes in developing robust APIs and managing data structures, playing a crucial role in powering our application's core functionalities." 
        :socials="[
            'instagram' => 'https://www.instagram.com/sultainnfai/',
        ]" 
    />
</div>
