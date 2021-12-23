/*
Data types

undefined
null
boolean
number
string
Array
Object
Symbol

null, undefined, false, 0, "", NaN

var/let/const

for/while/do...while/for in/for of

*/

let a = 2;
let b = 5.67;
let c = "sdfsd";
let d = [];
let e = {};
let f = null;
let g = function(){

};

let obj = {
    qwerty: function(){},
    qwe: 67,
    3.4566: 456.78,
    [b]: 123,
    a, // a: a
    c // c: c
};

console.dir(obj);


let obj = {
    a: 10,
    b: [2,3,{
        c: 12,
    },7],
};

console.log(obj.b[2].c);


let a = 10;

function f() {
    let b = 10;

    function f2(){
        let e = 9;
        console.log(c);
    }

    f2();

    console.log(a);
}

f();

/*

EnvironmentRecord = {
    a: 10,
    f: {
        b: 10,
        f2: {
            e: 9,
            ref: f,
        },
        ref: global,
    },
    ref: null,
};

*/


let obj2 = {
    a: 10,
};

function f(obj) {
    obj.a++;
}

f(obj2);

console.log(obj2.a);


function f(){
    console.log(1);
}

window.f();
f();

var a = 9;

console.log(window.a);

let d = {
    f: function(){},
};

d.f();


let rectangle = {
    width: 100,
    height: 10,
    perimeter: function() {
        return (this.width + this.height) * 2;
    },
};

console.log(rectangle.perimeter());

rectangle.width = 9;

console.log(rectangle.perimeter());


function Rectangle(width, height) {
    this.width = width;
    this.height = height;

    this.perimeter = function() {
        return (this.width + this.height) * 2;
    };

    this.square = function(){
        return this.width * this.height;
    };
}

let rectangle = new window.Rectangle(10, 7);
console.dir(rectangle.square());


let obj2 = {
    k: 99,
};

let obj = {
    a: {
        g: 9,
    },
    b: 11,
    f33: {},
    proto: {
        c: 7,
        proto: {
            c: 56,
            f: 345,
            proto: obj2,
        },
    },
};
for(let item in obj){
    console.log(item);
}


function Rectangle(width, height) {
    this.width = width;
    this.height = height;
}

/*
Rectangle.prototype

{
    width: 10,
    height: 3,
    proto: Rectangle.prototype {
        constructor: Rectangle,
        square: function(){},
        perimeter: function(){},
        proto: {
            constructor: ddd,
            hasOwnProperty: function(string),
            proto: {
                proto: null,
            },
        },
    },
}
*/

Rectangle.prototype.perimeter = function(){
    return (this.width + this.height) * 2;
};

Rectangle.prototype.square = function(){
    return this.width * this.height;
};

let rectangle = new Rectangle(10, 7);
let rectangle2 = new Rectangle(10, 7);
console.dir(rectangle.hasOwnProperty());

let obj = {
    a: 10,
    proto: {
        b: 11,
    },
};
console.dir(obj);
console.log(obj.hasOwnProperty("a"));
console.log(obj.hasOwnProperty("b"));

/*
let rectangle = {
    width: 100,
    height: 10,

    perimeter: function() {
        return (this.width + this.height) * 2;
    },

    square: function(){
        return this.width * this.height;
    },
};
*/


function f(){
    console.log(234234);
}

f.asd = function(){
    console.log(typeof this);
    this();
};

console.dir(f.asd());


function fibonacci(limit, numbers) {
    numbers = numbers || [0, 1];

    if (limit === 0) {
        return [];
    }

    if (limit <= 2) {
        return numbers.slice(0, limit);
    }

    if(limit > numbers.length) {
        let nextNumber = [numbers[numbers.length - 1] + numbers[numbers.length - 2]];
        numbers = fibonacci(limit, numbers.concat(nextNumber));
    }

    return numbers;
}

console.dir(fibonacci(7));



function f(a) {
    function f2(b){
        return a + b;
    }

    return f2;
}

let f1 = f(2);

console.dir(f1(3));


Array.prototype.customFilter = function(compare){
    let result = [];

    for(let i = 0; i < this.length; i++){
        if(compare(this[i], i, this)){
            result.push(this[i]);
        }
    }

    return result;
};


Array.prototype.customEvery = function(compare){
    for(let i = 0; i < this.length; i++){
        if(!compare(this[i], i, this)){
            return false;
        }
    }

    return true;
};


Array.prototype.customSome = function(compare){
    for(let i = 0; i < this.length; i++){
        if(compare(this[i], i, this)){
            return true;
        }
    }

    return false;
};


Array.prototype.customForEach = function(compare){
    for(let i = 0; i < this.length; i++){
        compare(this[i], i, this);
    }
};


Array.prototype.customReduce = function(compare, initial){

    if(initial === undefined && this.length === 0){
        throw new Error("werdthjk");
    }

    initial = initial || 0;

    let acc = initial;
    for(let i = 0; i < this.length; i++){
        acc = compare(acc, this[i], i, this);
    }

    return acc;
};


Array.prototype.customSort = function(compare){
    for(let i = 0; i < this.length; i++){
        for(let j = i+1; j < this.length; j++){
            if(compare(this[i], this[j])){
                let temp = this[i];
                this[i] = this[j];
                this[j] = temp;
            }
        }
    }
};

let products = [
    {
        title: "product 1",
        price: 100,
        quantity: 10,
    },
    {
        title: "product 2",
        price: 78,
        quantity: 12,
    },
    {
        title: "product 3",
        price: 35,
        quantity: 15,
    },
    {
        title: "product 4",
        price: 92,
        quantity: 0,
    },
    {
        title: "product 5",
        price: 11,
        quantity: 10,
    },
];

products = products.filter((product) => product.quantity > 0 && product.price > 11);
products.customSort((product1, product2) => product1.price < product2.price);
console.dir(products);


Function.prototype.qwe = function(){
    console.log(234);
};


let obj = {
    c: 10,
};

function f(a, b, d, e, g){
    return a + b + d + e + g + this.c;
}

let f2 = f.bind(obj, 2, 3, 1, 5, 6);

console.dir(f2());


/*

bind
call
apply

*/

let obj = {
    c: 10,
};

function f(a, b, d, e, g){
    return a + b + d + e + g + this.c;
}

let res = f.apply(obj, [2, 3, 1, 5, 6]);

console.dir(res);


Function.prototype.customBind = function(context, ...argc){
    let obj = Object.assign({}, context);
    obj.func = this;

    return function(...arguments) {
        return obj.func(...argc, ...arguments);
    };
};


Function.prototype.customBind = function(context, ...argc){
    let symbol = Symbol("context");
    context[symbol] = this;

    return function(...arguments) {
        let result = context[symbol](...argc, ...arguments);
        delete context[symbol];
        return result;
    };
};

function f(a, b, d, e, g){
    return a + b + d + e + g + this.c;
}

let obj = {
    c: 10,
    func: 456,
};

let f2 = f.customBind(obj, 2, 4);

console.dir(f2(5, 6, 7));
console.dir(obj);


let obj = Object.create({}, {
    a: {
        value: 112,
        enumerable: true,
        configurable: true,
        writable: true,
    },
    sdfsdfa: {
        value: Object.create(null, {}),
        enumerable: true,
        configurable: true,
        writable: true,
    },
    dfdfhfgh: {
        value: 112,
        enumerable: true,
        configurable: true,
        writable: true,
    },
});

obj.a++;

for(let item in obj) {
    if(obj.hasOwnProperty(item)){
        console.dir(item);
    }
}


let obj = {
    a: 10,
};

function show(obj) {
    if(obj[Symbol.iterator] !== undefined){
        for (let item of obj) {
            console.log(item);
        }
    }
}

show("sdffgh");


let obj = {
    min: 0,
    max: 10,
    [Symbol.iterator](){
        let current = this.min;
        let max = this.max;

        return {
            next(){
                if(current <= max){
                    return {value: current++, done: false};
                }else{
                    return {value: undefined, done: true};
                }
            },
        };
    },
};

/*

let it = obj[Symbol.iterator]();
it.next(); // {value: 0, done: false}
it.next(); // {value: 1, done: false}
it.next(); // {value: 1, done: true}

*/
for (let item of obj) {
    console.log(item);
}

/*
function show(obj) {
    if(obj[Symbol.iterator] !== undefined){
        for (let item of obj) {
            console.log(item);
        }
    }
}

show(obj);*/


function* f(){
    console.log(1111);
    yield 23; // {value: 23, done: false}
    console.log(22222);
    yield 24; // {value: 24, done: false}
    console.log(33333333);
    yield 25;
    console.log(444444444444);
    yield 26;
    console.log(5);
    yield 27;
    console.log(6666);
    yield 28; // {value: 28, done: false}
    console.log(777777777);
    // {value: undefined, done: true}
}

for(let item of f()){
    console.log(item);
}


function* f(min, max){
    for(let i = min; i < max; i++){
        yield* f2();
    }
}

function* f2(){
    
}

for(let item of f(2, 5)){
    console.log(item);
}


new Promise((resolve, reject) => {
    setTimeout(() => {
        resolve(4);
    }, 2000);
}).then((value) => {
        return new Promise((resolve, reject) => {
            console.log("Promise 2");
            setTimeout(() => {
                resolve(value*2);
            }, 2000);
        }).then((value) => value * 2);
    },
    (value) => {
        console.log("e: " + value);
}).then((value) => {
    console.log("s2: " + value);
},(value) => {
    console.log("e2: " + value);
});
