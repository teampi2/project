import * as React from 'react'
import Card, { StyledMenu } from '@/templates/Card'
import IconButton from '@mui/material/IconButton'
import MenuItem from '@mui/material/MenuItem'
import EditIcon from '@mui/icons-material/Edit'
import DeleteIcon from '@mui/icons-material/Delete'
import MoreVertIcon from '@mui/icons-material/MoreVert'
import useClasses from '@/hooks/useClasses'

interface ClassesListItem {
  cls: IClass
}

export function ClassesListItem({ cls }: ClassesListItem) {
  const { setCurrentClass, handleToggleUpdateDialog, handleDeleteClass } =
    useClasses()

  const [anchorEl, setAnchorEl] = React.useState<null | HTMLElement>(null)
  const open = Boolean(anchorEl)

  const handleClick = (event: React.MouseEvent<HTMLElement>) => {
    setAnchorEl(event.currentTarget)
  }

  const handleClose = () => {
    setAnchorEl(null)
  }

  const handleUpdate = () => {
    setCurrentClass(cls)
    handleToggleUpdateDialog()
    handleClose()
  }

  const handleDelete = () => {
    handleDeleteClass(cls.id)
    handleClose()
  }

  return (
    <Card
      to="#"
      title={cls.name}
      subtitle="Nome do Coodenador(a)"
      action={
        <>
          <IconButton onClick={handleClick}>
            <MoreVertIcon />
          </IconButton>
          <StyledMenu open={open} anchorEl={anchorEl} onClose={handleClose}>
            <MenuItem onClick={handleUpdate} disableRipple>
              <EditIcon />
              Edit
            </MenuItem>
            <MenuItem onClick={handleDelete} disableRipple>
              <DeleteIcon />
              Delete
            </MenuItem>
          </StyledMenu>
        </>
      }
    />
  )
}
