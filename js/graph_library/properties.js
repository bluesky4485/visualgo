/*
 * Contains visualization properties (SVG objects size, color, etc.)
 * Make sure to add the corresponding constants to the constant.js file
 */

/*
 * Widget
 */

const MAIN_SVG_WIDTH = 900;
const MAIN_SVG_HEIGHT = 500;
const PSEUDOCODE_SVG_WIDTH = 300;
const PSEUDOCODE_SVG_HEIGHT = 400;

/*
 * GraphVertexWidget
 */

const graphVertexProperties = {
  "innerVertex":{
    "r": 14,
    "width":30,
    "height": 30,
    "stroke-width": 0,
    "default":{
      "fill": "#eee",
      "stroke": "#fff"
    },
    "highlighted":{
      "fill": surpriseColour,
      "stroke": "#fff"
    },
    "traversed":{
      "fill": "#eee",
      "stroke": "#fff"
    },    
    "result":{
      "fill": "#f7e81e",
      "stroke": "#fff"
    },
	"greenFill":{
      "fill": "#52bc69",
      "stroke": "#fff"
    },
	"greenOutline":{
      "fill": "#eee",
      "stroke": "#fff"
    },
	"pinkFill":{
      "fill": "#ed5a7d",
      "stroke": "#fff"
    },
	"pinkOutline":{
      "fill": "#eee",
      "stroke": "#fff"
    },
	"blueFill":{
      "fill": "#2ebbd1",
      "stroke": "#fff"
    },
	"blueOutline":{
      "fill": "#eee",
      "stroke": "#fff"
    },
	"redFill":{
      "fill": "#d9513c",
      "stroke": "#fff"
    },
	"redOutline":{
      "fill": "#eee",
      "stroke": "#fff"
    },
	"greyFill":{
      "fill": "#cccccc",
      "stroke": "#fff"
    },
	"greyOutline":{
      "fill": "#eee",
      "stroke": "#fff"
    }
  },
  "outerVertex":{
    "r": 16,
    "width": 32,
    "height": 32,
    "stroke-width": 2,
    "default":{
      "fill": "#333",
      "stroke": "#333"
    },
    "highlighted":{
      "fill": surpriseColour,
      "stroke": surpriseColour
    },
    "traversed":{
      "fill": surpriseColour,
      "stroke": surpriseColour
    },
    "result":{
      "fill": "#f7e81e",
      "stroke": "#f7e81e"
    },
	"greenFill":{
      "fill": "#52bc69",
      "stroke": "#52bc69"
    },
	"greenOutline":{
      "fill": "#52bc69",
      "stroke": "#52bc69"
    },
	"pinkFill":{
      "fill": "#ed5a7d",
      "stroke": "#ed5a7d"
    },
	"pinkOutline":{
      "fill": "#ed5a7d",
      "stroke": "#ed5a7d"
    },
	"blueFill":{
      "fill": "#2ebbd1",
      "stroke": "#2ebbd1"
    },
	"blueOutline":{
      "fill": "#2ebbd1",
      "stroke": "#2ebbd1"
    },
	"redFill":{
      "fill": "#d9513c",
      "stroke": "#d9513c"
    },
	"redOutline":{
      "fill": "#d9513c",
      "stroke": "#d9513c"
    },
	"greyFill":{
      "fill": "#cccccc",
      "stroke": "#cccccc"
    },
	"greyOutline":{
      "fill": "#cccccc",
      "stroke": "#cccccc"
    }
  },
  "text":{
    "font-size": 16,
    "default":{
      "fill": "#333",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
    "highlighted":{
      "fill": "#fff",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
    "traversed":{
      "fill": surpriseColour,
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
    "result":{
      "fill": "#fff",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"greenFill":{
      "fill": "#fff",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"greenOutline":{
      "fill": "#52bc69",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"pinkFill":{
      "fill": "#fff",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"pinkOutline":{
      "fill": "#ed5a7d",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"blueFill":{
      "fill": "#fff",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"blueOutline":{
      "fill": "#2ebbd1",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"redFill":{
      "fill": "#fff",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"redOutline":{
      "fill": "#d9513c",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"greyFill":{
      "fill": "#fff",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"greyOutline":{
      "fill": "#cccccc",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    }
  }
};

/*
 * GraphEdgeWidget
 */

const graphEdgeProperties = {
  "animateHighlightedPath":{
      "stroke": surpriseColour,
      "stroke-width": 10
  },
  "path":{
    "stroke-width": 3,
    "default":{
      "stroke": "#333"
    },
    "highlighted":{
      "stroke": surpriseColour
    },
    "traversed":{
      "stroke": surpriseColour
    },
	"green":{
      "stroke": "#52bc69"
    },
	"pink":{
      "stroke": "#ed5a7d"
    },
	"blue":{
      "stroke": "#2ebbd1"
    },
	"red":{
      "stroke": "#d9513c"
    },
	"grey":{
      "stroke": "#cccccc"
    }
  },
  "weight":{
    "font-size": 16,
    "default":{
      "startOffset": "75%",
      "dy": -3,
      "fill": "#333",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
    "highlighted":{
      "startOffset": "75%",
      "dy": -3,
      "fill": surpriseColour,
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
    "traversed":{
      "startOffset": "75%",
      "dy": -3,
      "fill": surpriseColour,
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"green":{
      "startOffset": "75%",
      "dy": -3,
      "fill": "#52bc69",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"pink":{
      "startOffset": "75%",
      "dy": -3,
      "fill": "#ed5a7d",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"blue":{
      "startOffset": "75%",
      "dy": -3,
      "fill": "#2ebbd1",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"red":{
      "startOffset": "75%",
      "dy": -3,
      "fill": "#d9513c",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    },
	"grey":{
      "startOffset": "75%",
      "dy": -3,
      "fill": "#cccccc",
      "font-family": "'PT Sans', sans-serif",
      "font-weight": "bold",
      "text-anchor": "middle"
    }
  }
}

/*
 * marker.js
 * Currently this file doesn't exist; markers are placed in GraphEdgeWidget.js
 */

const ARROW_MARKER_WIDTH = 3;
const ARROW_MARKER_HEIGHT = 3;
const ARROW_REFX = 9;
const ARROW_FILL = "#333";