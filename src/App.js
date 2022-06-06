import React from 'react';
import './App.css';
import { BrowserRouter } from 'react-router-dom';
import {BrowserRouter as Router, Routes, Route} from 'react-router-dom';
import Header from './components/Header';
import SearchLocation from './components/SearchLocation';
import 'tachyons'
import WeatherCard from './components/WeatherCard';

function App () {
  
     return <>
       <Header />
       <BrowserRouter>
         <Routes>
            <Route path='/' element={
              <SearchLocation />
            }/>
            <Route path='/weather/city/:location' element=
              {<WeatherCard />}
            />
         </Routes>
       </BrowserRouter>
      </>
    
  
}

export default App;
