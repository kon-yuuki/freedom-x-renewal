"use strict";

class LinelinkAnim {
  constructor() {
    if(innerWidth < 1024) return;
    this.render();
  }

  render() {
    document.querySelectorAll(".c-linelink").forEach((link) => {
      if (link) {
        link.addEventListener("mouseenter", () => {
          const txtElement = link.querySelector(".c-linelink__txt");
          if (txtElement !== null) {
            txtElement.classList.add("is-animated");
          }
        });

        link.addEventListener("animationend", () => {
          const txtElement = link.querySelector(".c-linelink__txt");
          if (txtElement !== null) {
            txtElement.classList.remove("is-animated");
          }
        });
      }
    });

    document.querySelectorAll(".c-linelink--hidden").forEach((link) => {
      if (link) {

        link.addEventListener("mouseenter", () => {
          const txtElement = link.querySelector(".c-linelink__txt");
  
          if (txtElement !== null) {
            txtElement.classList.add("is-animated");
          }
        });

        link.addEventListener("mouseleave", () => {
          const txtElement = link.querySelector(".c-linelink__txt");
          if (txtElement !== null) {
            txtElement.classList.remove("is-animated");
          }
        });
      }
    });

    document.querySelectorAll("[data-hover]").forEach(link => {
      if (link) {
        link.addEventListener("mouseenter", () => {
          link.classList.add("is-hover");
        });

        const svg = link.querySelector('svg');
        if (svg) {
          svg.addEventListener('animationend', () => {
            link.classList.remove("is-hover");
          });
        }
      }
    });
  }
}

export default LinelinkAnim;