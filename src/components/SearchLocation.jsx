import React from "react";
import WeatherCard from './WeatherCard';
import {Link} from 'react-router-dom';
import './searchLocation.css';



class SearchLocation extends React.Component{
  constructor(){
    super();
    this.state = {
        location: '',
    }
} 
    
    handleChange = (event) =>{
        this.setState({location: event.target.value});
    }

    render(){
      
        return <>
            <div className="center searchCont">
              <div className="location">
                <input 
                  id="location" 
                  type="text" 
                  className="inputLocation f4 pa2 w-100"
                  value={this.state.location}
                  onChange={this.handleChange}
                  placeholder="Input Location"
                  
                />
              </div>
              <div className="btnSearch br2">
                  <Link to={ `/weather/city/${this.state.location || 'null'}`} 
                    className="linkSearch f4 pa2 w-100"
                  >
                      Search
                  </Link>
             </div>
        </div>
        </>
    }
}

export default SearchLocation;