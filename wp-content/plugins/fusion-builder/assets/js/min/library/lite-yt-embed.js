if("undefined"==typeof LiteYTEmbed){class e extends HTMLElement{connectedCallback(){this.videoId=this.getAttribute("videoid");let t=this.querySelector(".lty-playbtn");if(this.playLabel=t&&t.textContent.trim()||this.getAttribute("playlabel")||"Play",!this.style.backgroundImage){let e=this.getAttribute("width"),t="hqdefault.jpg";640<e?t="maxresdefault.jpg":480<e&&(t="sddefault.jpg"),this.style.backgroundImage=`url("https://i.ytimg.com/vi/${this.videoId}/${t}")`}if(t||((t=document.createElement("button")).type="button",t.classList.add("lty-playbtn"),this.append(t)),!t.textContent){const e=document.createElement("span");e.className="lyt-visually-hidden",e.textContent=this.playLabel,t.append(e)}t.removeAttribute("href"),this.addEventListener("pointerover",e.warmConnections,{once:!0}),this.addEventListener("click",this.addIframe),this.needsYTApiForAutoplay=navigator.vendor.includes("Apple")||navigator.userAgent.includes("Mobi")}static addPrefetch(e,t,i){const a=document.createElement("link");a.rel=e,a.href=t,i&&(a.as=i),document.head.append(a)}static warmConnections(){e.preconnected||(e.addPrefetch("preconnect","https://www.youtube-nocookie.com"),e.addPrefetch("preconnect","https://www.google.com"),e.addPrefetch("preconnect","https://googleads.g.doubleclick.net"),e.addPrefetch("preconnect","https://static.doubleclick.net"),e.preconnected=!0)}fetchYTPlayerApi(){window.YT||window.YT&&window.YT.Player||(this.ytApiPromise=new Promise((e,t)=>{var i=document.createElement("script");i.src="https://www.youtube.com/iframe_api",i.async=!0,i.onload=(t=>{YT.ready(e)}),i.onerror=t,this.append(i)}))}async addYTPlayerIframe(e){this.fetchYTPlayerApi(),await this.ytApiPromise;const t=document.createElement("div");this.append(t);const i=Object.fromEntries(e.entries());new YT.Player(t,{width:"100%",videoId:this.videoId,playerVars:i,events:{onReady:e=>{e.target.playVideo()}}})}async addIframe(){if(this.classList.contains("lyt-activated"))return;this.classList.add("lyt-activated");const e=new URLSearchParams(this.getAttribute("params")||[]);if(e.append("autoplay","1"),e.append("playsinline","1"),this.needsYTApiForAutoplay)return this.addYTPlayerIframe(e);const t=document.createElement("iframe");t.width=560,t.height=315,t.title=this.playLabel,t.allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture",t.allowFullscreen=!0,t.src=`https://www.youtube-nocookie.com/embed/${encodeURIComponent(this.videoId)}?${e.toString()}`,this.append(t),t.focus()}}void 0===customElements.get("lite-youtube")&&customElements.define("lite-youtube",e)}