import React from "react";

function Header(){
    return (
        <div className="header-cont center mv3">
            <h1 className="header-title ph3 washed-blue">Weather forecast</h1>
            <img src="https://cdn-icons-png.flaticon.com/512/831/831682.png" width={100} height={100}/>
        </div>
    )
}

export default Header;