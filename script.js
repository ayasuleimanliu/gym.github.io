function validateForm() {
  const fullname = document.getElementById("fullname").value.trim();
  const email = document.getElementById("email").value.trim();
  const phone = document.getElementById("phone").value.trim();
  const membership = document.getElementById("membership_type").value;

  if (!fullname) {
    alert("Please enter your full name.");
    return false;
  }

  if (!email) {
    alert("Please enter your email.");
    return false;
  } else {
  
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      alert("Please enter a valid email address.");
      return false;
    }
  }

  if (!phone) {
    alert("Please enter your phone number.");
    return false;
  } else {
   
    const phonePattern = /^[0-9\-+\s()]{6,20}$/;
    if (!phonePattern.test(phone)) {
      alert("Please enter a valid phone number.");
      return false;
    }
  }

  if (!membership) {
    alert("Please select a membership type.");
    return false;
  }

  return true;
}



