var app=new Vue({el:"#app",data:{roomName:"",host:window.location.hostname},methods:{create:function(){for(var t=this.roomName,o=0;!o;)"."===t.charAt(t.length-1)?(t=t.substr(0,t.length-1),this.roomName=t):o=1;this.roomName=t.replace(" ","-"),this.validate()&&window.open("http://"+this.roomName+"."+this.host+"/dev","_self")},validate:function(){return"www"!=this.roomName.substring(-3,3)}}});