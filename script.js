document.addEventListener("DOMContentLoaded", () => {
  const navLinks = document.querySelectorAll('.navbar a[href^="#"]');

  navLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const target = document.querySelector(link.getAttribute("href"));
      target.scrollIntoView({ behavior: "smooth" });
    });
  });

  // Form validation
  const contactForm = document.querySelector('form[action="submit_form.php"]');
  contactForm.addEventListener("submit", (e) => {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();

    if (!name || !email || !message) {
      e.preventDefault();
      alert("Please fill in all fields.");
    } else if (!validateEmail(email)) {
      e.preventDefault();
      alert("Please enter a valid email address.");
    }
  });

  // Email validation function
  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }

  // Scroll reveal effect for sections
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    },
    { threshold: 0.2 }
  );

  const sections = document.querySelectorAll("section");
  sections.forEach((section) => observer.observe(section));
});
document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");

  form.addEventListener("submit", (event) => {
    event.preventDefault();

    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;

    if (name && email) {
      alert(`Thank you, ${name}! Your message has been sent successfully.`);
    }

    form.submit();
  });
});

// document.addEventListener("DOMContentLoaded", () => {
//   const form = document.querySelector("form");
//   const popup = document.getElementById("popup");
//   const closePopup = document.getElementById("close-popup");
//   const userNameSpan = document.getElementById("user-name");

//   form.addEventListener("submit", (event) => {
//     event.preventDefault();

//     const name = document.getElementById("name").value;

//     if (name) {
//       userNameSpan.textContent = name;
//       popup.classList.add("show");
//     }
//   });

//   // Close the popup
//   closePopup.addEventListener("click", () => {
//     popup.classList.remove("show");
//   });
// });
