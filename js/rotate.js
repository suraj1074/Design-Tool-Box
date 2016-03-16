$(document).ready(function(){
	function rotateObject(angleOffset) {
    var obj = canvas.getActiveObject(),
        resetOrigin = false;

    if (!obj) return;

    var angle = obj.getAngle() + angleOffset;

    if ((obj.originX !== 'center' || obj.originY !== 'center') && obj.centeredRotation) {
        obj.setOriginToCenter && obj.setOriginToCenter();
        resetOrigin = true;
    }

    angle = angle > 360 ? 90 : angle < 0 ? 270 : angle;

    obj.setAngle(angle).setCoords();

    if (resetOrigin) {
        obj.setCenterToOrigin && obj.setCenterToOrigin();
    }

    canvas.renderAll();
}

fabric.util.addListener(document.getElementById('flipVert'), 'click', function () {
    rotateObject(-90);
});
fabric.util.addListener(document.getElementById('flipHori'), 'click', function () {
    rotateObject(180);
});

fabric.Object.prototype.setOriginToCenter = function () {
    this._originalOriginX = this.originX;
    this._originalOriginY = this.originY;

    var center = this.getCenterPoint();

    this.set({
        originX: 'center',
        originY: 'center',
        left: center.x,
        top: center.y
    });
};

fabric.Object.prototype.setCenterToOrigin = function () {
    var originPoint = this.translateToOriginPoint(
    this.getCenterPoint(),
    this._originalOriginX,
    this._originalOriginY);

    this.set({
        originX: this._originalOriginX,
        originY: this._originalOriginY,
        left: originPoint.x,
        top: originPoint.y
    });
};
});