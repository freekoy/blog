var express = require('express');
var router = express.Router();


const MongoClient = require('mongodb').MongoClient;
const ObjectId = require('mongodb').ObjectId;
var url = "mongodb://127.0.0.1/blog";
var cat;
var art;
// Use connect method to connect to the server
MongoClient.connect(url, function(err, db) {
  if(err) {
    console.log(err);
  }else {
    art = db.collection('art');
    cat = db.collection('cat');
    console.log("Connected successfully to server");
    //console.log(cat);
  }
});

//user
let user = ['indexes6','txcy5566'];

//verifycode
let verifycode = {};
verifycode.arr = [];
verifycode.countcode = function() {
  let code = [];
  let count = ['+','-','*','/'];
  code[0] = parseInt(Math.random()*10);
  code[1] = parseInt(Math.random()*10);
  code[2] = count[parseInt(Math.random()*4)];
  return code;
};

/* GET home page. */
router.get('/', function(req, res, next) {
  let data = {
    title: 'freekoy',
  };
  cat.find({}).toArray(function(err, docs) {
    if(err) {
      console.log(err);
    }else {
      data.cats = docs;
    }
  });
  art.find({}).toArray(function(err, docs) {
    if(err) {
      res.send(err);
    }else {
      data.arts = docs;
      res.render('index', data);
    }
  });
});

router.get('/data', function(req, res, next) {
  let data = {
    title: 'freekoy',
  };
  art.find({}).toArray(function(err, docs) {
    if(err) {
      res.send(err);
    }else {
      data.arts = docs;
    }
  });
  cat.find({}).toArray(function(err, docs) {
    if(err) {
      res.send(err);
    }else {
      data.cats = docs;
      res.send(JSON.stringify(data));
    }
  });
});

router.get('/aboutme', function(req, res, next) {
  let data = {
    title: 'freekoy',
    content: '追求卓越,不止于代码的攻城狮',
  };
  cat.find({}).toArray(function(err, docs) {
    if(err) {
      res.send(err);
    }else {
      data.cats = docs;
      res.render('aboutme', data);
    }
  });
});

router.get('/code', function(req, res, next) {
  verifycode.arr = verifycode.countcode();
  res.send(verifycode.arr);
});

router.get('/login', function(req, res, next) {
  res.render('login', { 'title': 'freekoy','code': verifycode});
});

router.post('/login', function(req, res, next) {
  if(req.body.user == user[0]
    && req.body.password == user[1]
    && req.body.code == eval(verifycode.arr[0] + verifycode.arr[2] + verifycode.arr[1])) {
    res.cookie('name', 'indexes6', { expires: new Date(Date.now() + 900000), httpOnly: true });
    res.redirect('/artlist');
  }else {
    res.redirect('/login');
  }
});

router.get('/article/:art_title', function(req, res, next) {
  let data = {
    title: 'freekoy'
  };
  cat.find({}).toArray(function(err, docs) {
    if(err) {
      console.log(err);
    }else {
      data.cats = docs;
    }
  });
  art.update({'art_title': req.params.art_title}, {$inc: {'read_number': 1}});
  art.find({'art_title': req.params.art_title}).toArray(function(err, docs) {
    if(err) {
      console.log(err);
    }else {
      data.art = docs;
      res.render('article', data);
    }
  });
});

router.get('/artlist', function(req, res, next) {
  if(req.cookies.name !== user[0]) {
    res.send('非法访问');
  }else {
    let data = {
      title: 'freekoy',
    };
    art.find({}).toArray(function(err, docs) {
      if(err) {
        console.log(err);
      }else {
        data.arts = docs;
        res.render('artlist', data);
      }
    });
  }
});

router.get('/artadd', function(req, res, next) {
  if(req.cookies.name !== user[0]) {
    res.send('非法访问');
  }else {
    let data = {
      title: 'freekoy',
    };
    cat.find({}).toArray(function(err, docs) {
      if(err) {
        console.log(err);
      }else {
        data.cats = docs;
        res.render('artadd', data);
      }
    });
  }
});

router.post('/artadd', function(req, res, next) {
  let data = {
    title: 'freekoy',
    art_title: req.body.art_title,
    cat_name: req.body.cat_name,
    content: req.body.content,
    pubtime: Date.now(),
    read_number: 0,
    comment_number: 0,
    commentlist: {},
  };
  art.insert(data);
  cat.update({cat_name: req.body.cat_name},{$inc: {art_number: 1}});
  setTimeout("res.redirect('artlist')",1000);
});

router.get('/artedit/:art_title', function(req, res, next) {
  if(req.cookies.name !== user[0]) {
    res.send('非法访问');
  }else {
    let data = {
      title: 'freekoy',
    };
    art.find({art_title: req.params.art_title}).toArray(function(err, docs) {
      if(err) {
        console.log(err);
      }else {
        data.art = docs;
        res.render('artedit', data);
      }
    });
  }
});

router.post('/artedit/:art_title', function(req, res, next) {
  console.log(req.params.art_title);
  art.update(
  {'art_title': req.params.art_title},
  {$set: {'art_title': req.body.art_title,'content': req.body.content}});
  res.redirect('/artlist');
});

router.get('/artdel/:art_title/:cat_name', function(req, res, next) {
  if(req.cookies.name !== user[0]) {
    res.send('非法访问');
  }else {
    art.remove({'art_title': req.params.art_title});
    cat.update({'cat_name': req.params.cat_name},{$inc: {'art_number': -1}});
    res.redirect('/artlist');
  }
});

router.get('/catlist', function(req, res, next) {
  if(req.cookies.name !== user[0]) {
    res.send('非法访问');
  }else {
    let data = {
      title: 'freekoy',
    };
    cat.find({}).toArray(function(err, docs) {
      if(err) {
        console.log(err);
      }else {
        data.cats = docs;
        res.render('catlist', data);
      }
    });
  }
});

router.get('/catadd', function(req, res, next) {
  if(req.cookies.name !== user[0]) {
    res.send('非法访问');
  }else {
    res.render('catadd', { title: 'freekoy' });
  }
});

router.post('/catadd', function(req, res, next) {
  cat.insert({'cat_name':req.body.cat_name,'art_number':0});
  res.redirect('/catlist');
});

router.get('/catedit/:cat_name', function(req, res, next) {
  if(req.cookies.name !== user[0]) {
    res.send('非法访问');
  }else {
    res.render('catedit', { title: 'freekoy',cat_name: req.params.cat_name});
  }
});

router.post('/catedit/:cat_name', function(req, res, next) {
  cat.update({'cat_name':req.params.cat_name},{$set:{'cat_name':req.body.cat_name}});
  art.update({'cat_name':req.params.cat_name},{$set:{'cat_name':req.body.cat_name}});
  res.redirect('/catlist');
});

router.get('/catdel/:cat_name/:art_number', function(req, res, next) {
  if(req.cookies.name !== user[0]) {
    res.send('非法访问');
  }else {
    if(req.params.art_number == 0) {
      cat.remove({'cat_name':req.params.cat_name});
      res.redirect('/catlist');
    }else {
      res.send('分类下有文章,不能删除');
    }
  }
});

router.get('/catname/:cat_name', function(req, res, next) {
  let data = {
    title: 'freekoy',
  };
  cat.find({}).toArray(function(err, docs) {
    if(err) {
      console.log(err);
    }else {
      data.cats = docs;
      setTimeout('success()',500);
  }
});
  function success() {
    art.find({'cat_name':req.params.cat_name}).toArray(function(err, docs) {
      if(err) {
        console.log(err);
      }else {
        data.arts = docs;
        res.render('catname', data);
      }
    });
  }
});

module.exports = router;
