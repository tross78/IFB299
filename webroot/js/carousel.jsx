import React, { Component } from 'react';
import ReactDOM from 'react-dom';
const Carousel = require('react-bootstrap/lib/Carousel');
const CarouselItem = require('react-bootstrap/lib/CarouselItem');

const carouselInstance = (
  <Carousel>
    <CarouselItem>
      <img width={900} height={500} alt=" " src="http://i.imgur.com/NQpW6hm.jpg"/>
      <CarouselCaption>
        <h3>First slide label</h3>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </CarouselCaption>
    </CarouselItem>
    <CarouselItem>
      <img width={900} height={500} alt=" " src="http://i.imgur.com/aau5RP1.jpg"/>
      <CarouselCaption>
        <h3>Second slide label</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </CarouselCaption>
    </CarouselItem>
    <CarouselItem>
      <img width={900} height={500} alt=" " src="http://i.imgur.com/eV91kxn.jpg"/>
      <CarouselCaption>
        <h3>Third slide label</h3>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </CarouselCaption>
    </CarouselItem>
    <CarouselItem>
      <img width={900} height={500} alt=" " src="http://i.imgur.com/biVYjls.jpg"/>
      <CarouselCaption>
        <h3>Third slide label</h3>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </CarouselCaption>
    </CarouselItem>
    <CarouselItem>
      <img width={900} height={500} alt=" " src="http://i.imgur.com/sZRaO9v.jpg"/>
      <CarouselCaption>
        <h3>Third slide label</h3>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </CarouselCaption>
    </CarouselItem>
    <CarouselItem>
      <img width={900} height={500} alt=" " src="http://i.imgur.com/zQr7xWv.jpg"/>
      <CarouselCaption>
        <h3>Third slide label</h3>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </CarouselCaption>
    </CarouselItem>
  </Carousel>
  
);

ReactDOM.render(carouselInstance, document.getElementById('feature-carousel'));