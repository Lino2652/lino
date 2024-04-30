(() => {
  const params = new URLSearchParams(window.location.search)

  const paramsVariant = params.get("variant")
  const paramsMsg = params.get("msg")

  if (paramsVariant == null) return null

  /**
   * @typedef ParsedSearchParams
   * @type {Object}
   * @property {"success" | "failure"} variant - The variant
   * @property {string} msg - The message
   */

  /** @type {ParsedSearchParams} */
  const searchParams = {
    variant: paramsVariant,
    msg: paramsMsg
  }

  if (searchParams.variant === "success") {
    Swal.fire({
      title: 'Success',
      text: searchParams.msg,
      icon: 'success',
      confirmButtonText: 'Ok'
    })
  }
  else {
    Swal.fire({
      title: 'Error',
      text: searchParams.msg,
      icon: 'error',
      confirmButtonText: 'Ok'
    })
  }
})()
