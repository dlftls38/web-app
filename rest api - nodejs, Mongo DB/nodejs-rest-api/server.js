const express = require('express');
const bodyParser = require('body-parser');
const server = express();

server.use(bodyParser.json());

const users = [
    {
        id:"2015038640",
        name:"ilshin",
        email:"dlftls38@naver.com"
    },
    {
        id:"4927432",
        name:"Jenny",
        email:"jenny@gmail.com"
    }
];

server.get("/api/user",(req,res)=>{
    res.json(users);
})

server.post("/api/user",(req,res)=>{
    users.push(req.body);
})

server.put('/api/user/:id',(req,res)=>{
    let foundIndex = users.findIndex(u=>u.id === req.params.id);
    if(foundIndex === -1){
        res.status(404).json({errorMessage: 'User was not found'});
    }
    else{
        users[foundIndex] = {...users[foundIndex], ...req.body};
        res.json(users[foundIndex]);
    }
})

server.delete('/api/user/:id',(req,res)=>{
    let foundIndex = users.findIndex(u => u.id === req.params.id);
    if(foundIndex === -1){
        res.status(404).json({errorMessage: 'User was not found'});
    }
    else{
        let foundUser = users.splice(foundIndex,1);
        res.json(foundUser[0]);
    }
})

server.listen(3000, ()=>{
    console.log('The server is running');
});