//@author Selassie Golloh 

function validateForm() {
    var x = document.getElementById('product').value;
   var y =document.getElementById('catSelect').value;
   var z=document.getElementById('brandSelect').value;
   var a = document.getElementById('price').value;
   var b = document.getElementById('description').value;
   var c = document.getElementById('images').value;
   var d = document.getElementById('keywords').value;

       if (x == "") {
        alert("Product Title must be filled out");
        return false;
                }

        if(y==0)
        {
          alert("Please select a category");
          return false;
        }
       
        if(z==0)
        {
          alert("Please select a brand");
          return false;
        }

      if (a == "") {
        alert("Price must be filled out");
        return false;
        }

    if (isNaN(a)) {
        alert("Price must be numbers only");
        return false;
        }

    if (b == "") {
        alert("Description must be filled out");
        return false;
        }

    if (c == "") {
        alert("Insert image");
        return false;
        }

    if (d == "") {
        alert("Insert keywords");
        return false;
        }
        return true;
    }




