import React from "react";
import { Link } from "react-router-dom";
import { useParams } from 'react-router-dom';
import './weatherCard.css';


export function withRouter(Children){
    return(props)=>{

       const match  = {params: useParams()};
       return <Children {...props}  match = {match}/>
   }
 }

class WeatherCard extends React.Component{
    constructor(props){
        super(props);
        this.state = {
            isLoading: true,
		    currentTemp: '',
            minTemp: '',
            maxTemp: '',
		    humidity: '',
		    windSpeed: '',
		    weatherDescr: '',
		    weatherIcon: '',
		    cityName: '',
		    cityNotFound: '',
        }
    }

    componentDidMount = () =>{
        this.props.match.params.location == 'null' ?
        this.setState({isLoading: false, cityNotFound: '404'}) :
        fetch('http://localhost:5000/weather/location/'+ this.props.match.params.location)
        .then(res => {
                return res.json();
        })
        .then(res => {
                if(res.data == "not found"){
                    this.setState({isLoading: false, cityNotFound: '404'});
                    return; 
                }
                this.setState({
                currentTemp: res.data.main.temp,
                weatherIcon: res.data.weather[0].icon,
                weatherDescr: res.data.weather[0].description,
                minTemp: res.data.main.temp_min,
                maxTemp: res.data.main.temp_max,
                humidity: res.data.main.humidity,
                windSpeed: res.data.wind.speed,
                cityName: res.data.name,
                isLoading: false,
                })
            
        })
    }

    getCurrentDate = () => {
        let today = new Date();
        let dd = String(today.getDate()).padStart(2, '0');
        let mm = String(today.getMonth() + 1).padStart(2, '0'); 
        var yyyy = today.getFullYear();
        today = dd + '.' + mm + '.' + yyyy;
        return today;
    }

    getImage = (iconCode) => {
        return `http://openweathermap.org/img/wn/${iconCode}@2x.png`
    }
      
    toSentence(str) {
        if (!str) return str;

        return str[0].toUpperCase() + str.slice(1);
    }

    render(){

        const loading = (
            <div>
                <p className="fr4">Loading...</p>
            </div>
        )

        const cityError = (
            <>
                <p className="f4">Location not found</p>
                <Link to='/' className="btnChange br2 linkBack">Try again</Link>
            </>
        )

        const WeatherCard = (
            this.state.cityNotFound == 404 ?
            cityError : <>
            <div className="container br4">
                    <div className="divIcon">
                        <img src={this.getImage(this.state.weatherIcon)} width={150} height={150}/>
                    </div>
                    <div className="divTemp">
                        <span className="b temp f3">
                            {Math.round(this.state.currentTemp)+ " ℃"}
                        </span>
                        <span className="desc f4">
                            {this.toSentence(this.state.weatherDescr)}
                        </span>
                    </div>
                    <div className="divDate f4">
                        <span>{this.getCurrentDate()}</span>
                    </div>
                    <div className="divHumAndWind f4">
                    <p className="humAndWind">
                            {"Humidity: " + this.state.humidity + " %"}
                            <br/>
                            {"Wind speed: " + Math.round(this.state.windSpeed) + " mph"}
                        </p>
                    </div>
                    <div className="divCity f3 b">
                        <span>{this.state.cityName}</span>
                    </div>
                </div>
                <div className="btnChange br2">
                    <Link to={ '/'} className="linkBack f4">Change City</Link>
            </div>
                        </>
        )

        const weather = (
            this.state.isLoading ? loading : WeatherCard
        )

        return (
            <div className="card-cont center sans-serif">
                { weather }
            </div>
        )
    }
}

export default withRouter(WeatherCard);