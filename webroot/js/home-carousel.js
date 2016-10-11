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
        <img width={1200} height={300} alt=" " src="http://i.imgur.com/NQpW6hm.jpg"/>
        <CarouselCaption>
        </CarouselCaption>
      </CarouselItem>
      <CarouselItem>
        <img width={1200} height={300} alt=" " src="http://i.imgur.com/eV91kxn.jpg"/>
        <CarouselCaption>
        </CarouselCaption>
      </CarouselItem>
      <CarouselItem>
        <img width={1200} height={300} alt=" " src="http://i.imgur.com/biVYjls.jpg"/>
        <CarouselCaption>
        </CarouselCaption>
      </CarouselItem>
      <CarouselItem>
        <img width={1200} height={300} alt=" " src="http://i.imgur.com/sZRaO9v.jpg"/>
        <CarouselCaption>
        </CarouselCaption>
      </CarouselItem>
      <CarouselItem>
        <img width={1200} height={300} alt=" " src="http://i.imgur.com/zQr7xWv.jpg"/>
        <CarouselCaption>
        </CarouselCaption>
      </CarouselItem>
    </Carousel>
    );
  }
};
