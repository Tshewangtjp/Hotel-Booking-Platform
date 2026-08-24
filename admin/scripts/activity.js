let activity_s_form = document.getElementById('activity_s_form');

    activity_s_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_activity();
    });

    function add_activity()
    {
        let data = new FormData();
        data.append('name',activity_s_form.elements['activity_name'].value);
        data.append('picture',activity_s_form.elements['activity_picture'].files[0]);
        data.append('add_activity','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/activities.php",true);

        xhr.onload = function(){
            var myModal = document.getElementById('activity-s');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if(this.responseText == 'inv_img'){
                alert('error','Only JPG, JPEG, PNG AND WEBP images are allowed!');
            }
            else if(this.responseText == 'inv_size'){
                alert('error','Image should be less than 1MB!');
            }
            else if(this.responseText == 'upload_failed')
            {
                alert('error','Image upload failed. Server Down!');
            }else{
                alert('success','New activity added!');
                activity_s_form.reset();
                get_activity();


            }
        }
        xhr.send(data);
    }

    function get_activity()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/activities.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
            document.getElementById('activity-data').innerHTML = this.responseText;
        }
        xhr.send('get_activity')
    }

    
    

    function rem_activity(val)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/activities.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onload = function(){
            if(this.responseText==1){
                alert('success','Activity removed');
                get_activity();
            }
            else{
                alert('error','Activity Failed to remove! Try again');
            }
        }
           
        
        xhr.send('rem_activity='+val);
    }

        window.onload = function(){
            get_activity();


    }