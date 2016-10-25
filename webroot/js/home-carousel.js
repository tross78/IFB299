import React, { Component } from 'react';
import ReactDOM from 'react-dom';
const Carousel = require('react-bootstrap/lib/Carousel');
const CarouselItem = require('react-bootstrap/lib/CarouselItem');
const CarouselCaption = require('react-bootstrap/lib/CarouselCaption');

export default class HomeCarousel extends React.Component {
   constructor() {
        super();
   }
  render() {
    return (
    <Carousel>
      <CarouselItem>
        <img width={1200} height={300} alt=" " src="/img/home-slider1.jpg"/>
        <CarouselCaption>
        </CarouselCaption>
      </CarouselItem>
      <CarouselItem>
        <img width={1200} height={300} alt=" " src="/img/home-slider2.jpg"/>
        <CarouselCaption>
        </CarouselCaption>
      </CarouselItem>
      <CarouselItem>
        <img width={1200} height={300} alt=" " src="/img/home-slider3.jpg"/>
        <CarouselCaption>
        </CarouselCaption>
      </CarouselItem>
      <CarouselItem>
        <img width={1200} height={300} alt=" " src="/img/home-slider4.jpg"/>
        <CarouselCaption>
        </CarouselCaption>
      </CarouselItem>
      <CarouselItem>
        <img width={1200} height={300} alt=" " src="/img/home-slider5.jpg"/>
        <CarouselCaption>
        </CarouselCaption>
      </CarouselItem>
    </Carousel>
    );
  }
};
