let place_s_form = document.getElementById('place_s_form');

    place_s_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_place();
    });

    function add_place()
    {
        let data = new FormData();
        data.append('name',place_s_form.elements['place_name'].value);
        data.append('picture',place_s_form.elements['place_picture'].files[0]);
        data.append('desc',place_s_form.elements['place_desc'].value);
        data.append('add_place','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/place.php",true);

        xhr.onload = function(){
            var myModal = document.getElementById('place-s');
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
                alert('success','New Place added!');
                place_s_form.reset();
                get_place();


            }
        }
        xhr.send(data);
    }

    function get_place()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/place.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
            document.getElementById('place-data').innerHTML = this.responseText;
        }
        xhr.send('get_place')
    }

    

    function rem_place(val)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/place.php",true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onload = function(){
            if(this.responseText==1){
                alert('success','Place removed');
                get_place();
            }
            else{
                alert('error','Place Failed to remove! Try again');
            }
        }
           
        
        xhr.send('rem_place='+val);
    }

        window.onload = function(){
            get_place();


    }